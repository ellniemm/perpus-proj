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
        DB::beginTransaction();

        try {
            // Debugging: log awal proses
            \Log::info('Mulai proses peminjaman');

            // Simpan data peminjaman
            $peminjaman = Peminjaman::create([
                'peminjaman_user_id' => auth()->id(),
                'peminjaman_status' => 1,
                'peminjaman_notes' => $request->peminjaman_notes ?? null,
            ]);

            \Log::info('Peminjaman berhasil disimpan: ' . $peminjaman->peminjaman_id);

            $cart = session()->get('cart', []);
            \Log::info('Isi keranjang:', $cart);

            foreach ($cart as $item) {
                if (!isset($item['buku_stok'])) {
                    throw new \Exception('Undefined array key "buku_stok"');
                }

                // Cari buku berdasarkan ID
                $buku = Buku::find($item['buku_id']);

                if (!$buku) {
                    throw new \Exception('Buku tidak ditemukan untuk ID: ' . $item['buku_id']);
                }

                // Cek apakah stok mencukupi
                if ($buku->stok < $item['buku_stok']) {
                    throw new \Exception('Stok buku tidak mencukupi untuk buku: ' . $buku->judul);
                }

                // Kurangi stok buku
                $buku->stok -= $item['buku_stok'];
                $buku->save();

                // Simpan detail peminjaman
                PeminjamanDetail::create([
                    'detail_buku_id' => $item['buku_id'],
                    'detail_peminjaman_id' => $peminjaman->peminjaman_id,
                    'buku_stok' => $item['buku_stok'],
                ]);
            }

            // Kosongkan keranjang
            session()->forget('cart');

            // Commit transaksi
            DB::commit();

            \Log::info('Transaksi berhasil, keranjang dikosongkan.');

            return response()->json([
                'status' => 'success',
                'message' => 'Peminjaman berhasil dilakukan!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error('Kesalahan saat melakukan peminjaman: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat melakukan peminjaman: ' . $e->getMessage(),
            ]);
        }
    }
}
