<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanControllers extends Controller
{
    public function indexAdmin()
    {

        $user = Auth::user();
        if (Auth::user()->user_level == 'admin') {
            $peminjamans = Peminjaman::with('user', 'details.buku')->get();
        } else {
            $peminjamans = Peminjaman::with('details.buku')->where('peminjaman_user_id', Auth::id())->get();
        }
        return view('pages.admin.peminjaman.index', compact('peminjamans', 'user'));
    }

    public function indexSiswa()
    {

        $user = Auth::user();
        $peminjamans = Peminjaman::where('peminjaman_user_id', Auth::id())
            ->orderBy('peminjaman_id', 'desc')
            ->with('details.buku') // Load buku terkait melalui details
            ->get();
        return view('pages.siswa.peminjaman.index', compact('peminjamans', 'user'));
    }
    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->only('peminjaman_notes'));
        return redirect()->route('adminPeminjamanIndex')->with('success', 'Peminjaman updated successfully.');
    }

    public function store(Request $request)
    {
        // Validasi input dari request
        $validated = $request->validate([
            'cart' => 'required|array|min:1', // Keranjang harus berupa array dan minimal 1 item
            'cart.*.buku_id' => 'required|integer|exists:buku,buku_id', // Buku harus ada di database
            'cart.*.quantity' => 'required|integer|min:1', // Jumlah minimal 1
        ]);

        try {
            DB::beginTransaction();

            // Simpan data peminjaman
            $peminjaman = Peminjaman::create([
                'peminjaman_user_id' => auth()->id(), // Menggunakan ID pengguna yang sedang login
                'peminjaman_status' => false, // Status default false
                'peminjaman_notes' => '', // Notes default kosong
            ]);

            // Iterasi melalui keranjang dan simpan detail peminjaman
            foreach ($validated['cart'] as $item) {
                $buku = Buku::findOrFail($item['buku_id']);

                // Periksa stok buku
                if ($buku->buku_stok < $item['quantity']) {
                    throw new \Exception("Stok untuk buku {$buku->buku_judul} tidak mencukupi.");
                }

                // Kurangi stok buku
                $buku->decrement('buku_stok', $item['quantity']);

                // Simpan detail peminjaman
                PeminjamanDetail::create([
                    'detail_buku_id' => $item['buku_id'],
                    'detail_peminjaman_id' => $peminjaman->peminjaman_id,
                    'quantity' => $item['quantity'],
                ]);
            }

            DB::commit();

            // Kembalikan respons sukses
            return response()->json([
                'success' => true,
                'message' => 'Peminjaman berhasil dilakukan!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            // Kembalikan respons gagal
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
}
