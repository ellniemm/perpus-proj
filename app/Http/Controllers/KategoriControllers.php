<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriControllers extends Controller
{
    public function kategoriPage()
    {
        $user = Auth::user();
        $kategoris = Kategori::all();
        return view('pages.admin.kategori.index', compact('kategoris', 'user'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_nama' => 'required|max:50',
            'kategori_desc' => 'required|max:150',
        ]);
        Kategori::create($validated);
        return redirect()->route('adminkategori')->with('success', 'Data kategori berhasil ditambahkan!');
    }


    public function edit($id)
{
    $kategori = Kategori::findOrFail($id);
    return response()->json($kategori);
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'kategori_nama' => 'required|max:50',
        'kategori_desc' => 'required|max:150',
    ]);

    $kategori = Kategori::findOrFail($id);
    $kategori->update($validated);

    return response()->json(['success' => 'Kategori berhasil diperbarui']);
}

}
