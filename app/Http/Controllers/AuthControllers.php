<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthControllers extends Controller
{
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_username' => 'required|string',
            'user_password' => 'required|string',
        ]);

        $credentials = [
            'user_username' => $request->user_username,
            'password' => $request->user_password,
        ];

        if (Auth::attempt($credentials)) {
            // Redirect user based on their level
            $user = Auth::user();
            if ($user->user_level === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('siswaDashboard');
            }
        }

        return back()->withErrors([
            'user_username' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function showRegisterForm()
    {
        return view('pages.auth.regisiswa');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'user_nama' => 'required|string|max:255',
            'user_alamat' => 'required|string|max:255',
            'user_username' => 'required|string|max:255|unique:users',
            'user_email' => 'required|email|max:255|unique:users',
            'user_notelp' => 'required|numeric',
            'user_password' => 'required|string|min:5',
            'user_level' => 'required|string', // Ensure this line exists
        ]);

        // Hash the password
        $validatedData['user_password'] = Hash::make($validatedData['user_password']);

        // Create the user and automatically log them in
        $user = User::create($validatedData);

        // Log the user in
        Auth::login($user);

        // Redirect to the appropriate page
        return redirect()->route('login'); // or any route you prefer
    }
}
