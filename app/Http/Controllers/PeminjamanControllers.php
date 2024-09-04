<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $peminjamans = Peminjaman::with('user', 'details.buku')->get();
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
        $peminjaman = Peminjaman::create([
            'peminjaman_user_id' => Auth::id(),
            'peminjaman_notes' => $request->peminjaman_notes,
        ]);

        foreach ($request->buku_ids as $buku_id) {
            PeminjamanDetail::create([
                'detail_peminjaman_id' => $peminjaman->peminjaman_id,
                'detail_buku_id' => $buku_id,
            ]);
        }

        return redirect()->route('adminPeminjamanIndex')->with('success', 'Peminjaman created successfully.');
    }
}
