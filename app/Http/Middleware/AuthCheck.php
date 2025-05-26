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
        if (!Auth::check()) {
            return redirect()->route('admin.auth.login');
        }

        if (Auth::check() && $request->routeIs('admin.auth.login')) {
            $user = Auth::user();
            $currentHost = $request->getHost();
            $expectedSubdomain = $user->subdomain . '.' . parse_url(config('app.url'), PHP_URL_HOST);

            if ($currentHost !== $expectedSubdomain) {
                $redirectUrl = $request->getScheme() . '://' . $expectedSubdomain . $request->getRequestUri();
                return redirect()->to($redirectUrl);
            }
        }

        return $next($request);
    }
}
