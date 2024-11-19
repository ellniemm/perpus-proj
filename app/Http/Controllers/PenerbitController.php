<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
{
    public function penerbitPage()
    {
        $user = Auth::user();
        $penerbits = Penerbit::all();
        return view('pages.admin.penerbit.index', compact('penerbits', 'user'));
    }

    public function edit($id)
    {
        $penerbits = Penerbit::findOrFail($id);
        return response()->json($penerbits);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Debugging
            \Log::info("Mulai proses peminjaman");

            // Simpan data peminjaman
            $peminjaman = Peminjaman::create([
                'peminjaman_user_id' => auth()->id(),
                'peminjaman_status' => 1,
                'peminjaman_notes' => $request->peminjaman_notes ?? null,
            ]);

            \Log::info('Peminjaman berhasil disimpan: ' . $peminjaman->peminjaman_id);

            $cart = session()->get('cart', []);

            foreach ($cart as $item) {
                // Cari buku berdasarkan ID
                $buku = Buku::find($item['id']);

                // Cek apakah stok mencukupi
                if ($buku->stok < $item['quantity']) {
                    // Jika stok tidak cukup, rollback transaksi dan beri pesan error
                    throw new \Exception('Stok buku tidak mencukupi untuk buku: ' . $buku->judul);
                }

                // Kurangi stok buku
                $buku->stok -= $item['quantity'];
                $buku->save();

                // Simpan detail peminjaman
                PeminjamanDetail::create([
                    'detail_buku_id' => $item['id'],
                    'detail_peminjaman_id' => $peminjaman->peminjaman_id,
                    'quantity' => $item['quantity'],
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
