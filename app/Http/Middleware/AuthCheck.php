<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!Auth::check() && Route::is([
                'admin.office.*',
                'admin.client.*',
                'admin.editor.*',
                'admin.profile.edit',
                'admin.history.create',
                'admin.video.create',
                'admin.review.create',
            ])) {
            return redirect()->route('admin.auth.loginView');
        }

        if ($user) {
            $isRegisterRoute = Route::is('admin.auth.register') || Route::is('admin.auth.registerView');
            $isLoginRoute = Route::is('admin.auth.loginView');

            if ($user->step != 4) {
                if ($isLoginRoute || !$isRegisterRoute) {
                    return redirect()->route('admin.auth.registerView');
                }
            } elseif ($isLoginRoute || $isRegisterRoute) {
                return redirect()->route('admin.profile.index');
            }
        }

        return $next($request);
    }
}
