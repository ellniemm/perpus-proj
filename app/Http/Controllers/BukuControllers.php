<?php

namespace App\Http\Controllers;

use App\Livewire\Components\Siswa\Cart;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function adminBuku()
    {
        $user = Auth::user();
        $bukus = Buku::with(['kategori', 'penerbit', 'rak', 'penulis'])->get();
        return view('pages.admin.buku.index', compact('bukus', 'user'));
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $user = Auth::user();
        $bukus = Buku::all();
        $cartIds = array_column($cart, 'id');
        return view('pages.siswa.buku.index', compact('bukus', 'user', 'cart', 'cartIds'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $rak = Rak::all();
        $penulis = Penulis::all();
        $user = Auth::user();
        return view('pages.admin.buku.create', compact('kategori', 'penerbit', 'rak', 'penulis', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'buku_kategori_id' => 'required|integer',
            'buku_penerbit_id' => 'required|integer',
            'buku_rak_id' => 'required|integer',
            'buku_penulis_id' => 'required|integer',
            'buku_nama' => 'required|max:255',
            'buku_isbn' => 'required|max:16',
            'buku_stok' => 'required|integer',
            'buku_deskripsi' => 'required|max:255',
            'buku_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk file gambar
        ]);

        // Handle file upload
        if ($request->hasFile('buku_img')) {
            $imageName = time() . '.' . $request->buku_img->extension();
            $request->buku_img->move(public_path('images'), $imageName);
            $validated['buku_img'] = $imageName; // Simpan nama file di database
        }

        Buku::create($validated);

        return redirect()->route('adminbuku')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::find($id);

        if ($buku) {
            return response()->json($buku);
        }

        return response()->json(['message' => 'Buku tidak ditemukan'], 404);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'buku_nama' => 'required|string|max:255',
            'buku_kategori_id' => 'required|integer',
            'buku_penerbit_id' => 'required|integer',
            'buku_rak_id' => 'required|integer',
            'buku_penulis_id' => 'required|integer',
            'buku_isbn' => 'required|string|max:255',
            'buku_stok' => 'required|integer',
            'buku_deskripsi' => 'nullable|string',
            'buku_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Temukan buku berdasarkan ID
        $buku = Buku::findOrFail($id);

        // Jika file gambar ada, proses unggahan
        if ($request->hasFile('buku_img')) {
            // Hapus gambar lama jika ada
            if ($buku->buku_img && file_exists(public_path($buku->buku_img))) {
                unlink(public_path($buku->buku_img));
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->buku_img->extension();
            $request->buku_img->move(public_path('images'), $imageName);
            $validated['buku_img'] = 'images/' . $imageName; // Simpan jalur relatif
        }

        // Perbarui data buku lainnya
        $buku->update($validated);

        return redirect()->route('adminbuku')->with('success', 'Data buku berhasil diperbarui');
    }


    public function pinjam(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $peminjaman = Peminjaman::create([
            'peminjaman_user_id' => Auth::id(),
            'peminjaman_notes' => 'Peminjaman buku ' . $buku->buku_nama,
        ]);

        PeminjamanDetail::create([
            'detail_peminjaman_id' => $peminjaman->peminjaman_id,
            'detail_buku_id' => $buku->buku_id,
        ]);

        return redirect()->route('adminPeminjamanIndex')->with('success', 'Buku berhasil dipinjam.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $books = Buku::where('buku_nama', 'like', '%' . $searchTerm . '%')->get();
        $cart = session()->get('cart', []);
        $cartIds = array_column($cart, 'id');

        return response()->json([
            'books' => $books,
            'cartIds' => $cartIds
        ]);
    }



    public function destroy(string $id)
    {
        //
    }
}
