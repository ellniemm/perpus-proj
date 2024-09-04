<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControllers extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.admin.user.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.admin.user.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_nama' => 'required|max:50',
            'user_alamat' => 'required|max:50',
            'user_username' => 'required|max:50',
            'user_email' => 'required|max:50|email',
            'user_notelp' => 'required|max:13',
            'user_password' => 'required|max:50',
            'user_level' => 'required|in:admin,siswa',
        ]);

        User::create([
            'user_nama' => $request->user_nama,
            'user_alamat' => $request->user_alamat,
            'user_username' => $request->user_username,
            'user_email' => $request->user_email,
            'user_notelp' => $request->user_notelp,
            'user_password' => Hash::make($request->user_password), // Encrypt password
            'user_level' => $request->user_level,
        ]);

        return redirect()->route('adminUserIndex')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_nama' => 'required',
            'user_alamat' => 'required',
            'user_username' => 'required',
            'user_email' => 'required|email',
            'user_notelp' => 'required',
            'user_level' => 'required|in:admin,siswa',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'user_nama' => $request->user_nama,
            'user_alamat' => $request->user_alamat,
            'user_username' => $request->user_username,
            'user_email' => $request->user_email,
            'user_notelp' => $request->user_notelp,
            'user_level' => $request->user_level,
        ]);

        return redirect()->route('adminUserIndex')->with('success', 'User updated successfully');
    }
}
