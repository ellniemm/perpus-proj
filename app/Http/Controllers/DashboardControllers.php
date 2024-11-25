<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardControllers extends Controller
{
    public function adminDash()
    {
        $user = Auth::user();
        return view('pages.admin.dashboard', compact('user'));
    }

    public function proad()
    {
        $user = Auth::user();
        return view('pages.admin.profile', compact('user'));
    }
    public function prois()
    {
        $user = Auth::user();
        return view('pages.siswa.profile', compact('user'));
    }

    public function siswaDash()
    {
        $bukus = Buku::with(['kategori', 'penerbit', 'rak', 'penulis'])->get();
        $user = Auth::user();
        return view('pages.siswa.dashboard', compact('user', 'bukus'));
    }
}
