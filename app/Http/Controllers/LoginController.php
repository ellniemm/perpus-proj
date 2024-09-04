<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    protected function authenticated(Request $request, $user)
{
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'siswa') {
        return redirect()->route('siswa.dashboard');
    } else {
        Auth::logout();
        return redirect('/login')->with('error', 'You are not authorized to access this page.');
    }
}
}
