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
        $validated = $request->validate([
            'penerbit_nama' => 'required|string|max:50',
            'penerbit_desc' => 'required|string|max:150',
        ]);

        Penerbit::create($validated);
        return redirect()->route('adminpenerbit')->with('success', 'Data penerbit berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'penerbit_nama' => 'required|max:50',
            'penerbit_desc' => 'required|max:150',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($validated);

        return response()->json(['success' => 'Penerbit berhasil diperbarui']);
    }
}
