<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenulisControllers extends Controller
{
    public function penulisPage()
    {
        $user = Auth::user();
        $penuliss = Penulis::all();
        return view('pages.admin.penulis.index', compact('penuliss', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penulis_nama' => 'required|string|max:50',
            'penulis_desc' => 'required|string|max:150',
        ]);

        Penulis::create($validated);
        return redirect()->route('adminpenulis')->with('success', 'Data penulis berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return response()->json($penulis);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'penulis_nama' => 'required|max:50',
            'penulis_desc' => 'required|max:150',
        ]);

        $penulis = Penulis::findOrFail($id);
        $penulis->update($validated);

        return response()->json(['success' => 'Penulis berhasil diperbarui']);
    }
}
