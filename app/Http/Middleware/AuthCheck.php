<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->step != 4) {
            return redirect()->route('admin.auth.register');
        }

        return $next($request);
    }
}
