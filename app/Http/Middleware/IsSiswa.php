<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsSiswa
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_level === 'siswa') {
            return $next($request);
        }
        return response()->view('auth.error', ['message' => 'You are not authorized to access this page.']);
    }
}
