<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!auth()->check() || auth()->user()->user_level !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
