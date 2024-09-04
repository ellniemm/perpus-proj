<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartControllers extends Controller
{

    public function cartDetails()
    {
        $cart = session()->get('cart', []); // Pastikan default-nya adalah array kosong
        
    }


    public function addToCart(Request $request)
    {
        $buku = Buku::find($request->buku_id);

        if (!$buku) {
            return response()->json(['status' => 'error', 'message' => 'Buku tidak ditemukan!']);
        }

        $cart = session()->get('cart', []);

        // Menggunakan $request->buku_id sebagai id buku
        if (!in_array($request->buku_id, array_column($cart, 'id'))) {
            $cart[] = [
                'id' => $request->buku_id,
                'nama' => $buku->buku_nama,
                'image' => $buku->buku_img,  // Menambahkan key 'image'
                'stok' => $buku->buku_stok,
                'quantity' => 1
            ];
            session()->put('cart', $cart); // Pastikan $cart adalah array

            return response()->json([
                'status' => 'success',
                'message' => 'Buku berhasil ditambahkan ke keranjang!',
                'cartCount' => count($cart)
            ]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Buku sudah ada di keranjang!']);
        }
    }



    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $newCart = array_filter($cart, function ($item) use ($request) {
            return $item['id'] != $request->buku_id;
        });

        session()->put('cart', $newCart);

        return response()->json(['status' => 'success', 'message' => 'Buku berhasil dihapus dari keranjang!']);
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        foreach ($cart as &$item) {
            if ($item['id'] == $request->buku_id) {
                $item['quantity'] = $request->quantity;
            }
        }
        session()->put('cart', $cart);

        return response()->json(['status' => 'success', 'message' => 'Quantity berhasil diperbarui!']);
    }


    public function checkout(Request $request)
    {
        // Mengambil item dari sesi keranjang
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang peminjaman kosong.');
        }

        // Buat data peminjaman baru
        $peminjaman = Peminjaman::create([
            'peminjaman_user_id' => Auth::id(),
            'peminjaman_status' => false, // Status false menandakan peminjaman belum dikembalikan
            'peminjaman_notes' => $request->input('peminjaman_notes', 'Tidak ada catatan tambahan'),
        ]);

        // Tambahkan setiap buku dalam keranjang ke peminjaman_detail
        foreach ($cart as $bukuId) {
            PeminjamanDetail::create([
                'detail_peminjaman_id' => $peminjaman->peminjaman_id,
                'detail_buku_id' => $bukuId,
                'quantity' => 1, // Default quantity adalah 1, sesuaikan jika perlu
            ]);
        }

        // Kosongkan keranjang setelah peminjaman berhasil
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Peminjaman buku berhasil.');
    }
}
