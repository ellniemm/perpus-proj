<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RakControllers extends Controller
{
    public function rakpage()
    {
        $user = Auth::user();
        $raks = Rak::all();
        return view('pages.admin.rak.index', compact('raks', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rak_nama' => 'required|string|max:50',
            'rak_lokasi' => 'required|string|max:150',
        ]);
        Rak::create($validated);
        return redirect()->route('adminrak')->with('success', 'Data rak berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $rak = Rak::findOrFail($id);
        return response()->json($rak);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'rak_nama' => 'required|max:50',
            'rak_lokasi' => 'required|max:150',
        ]);

        $rak = Rak::findOrFail($id);
        $rak->update($validated);

        return response()->json(['success' => 'Rak berhasil diperbarui']);
    }
}
