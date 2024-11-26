<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Validasi input dari request
        $validated = $request->validate([
            'penerbit_nama' => 'required|string|max:50', // Nama penerbit maksimal 50 karakter
            'penerbit_desc' => 'required|string|max:150', // Deskripsi penerbit maksimal 150 karakter
        ]);

        try {
            // Simpan data penerbit ke database
            Penerbit::create($validated);

            // Redirect dengan pesan sukses
            return redirect()->route('adminpenerbit')->with('success', 'Penerbit berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
