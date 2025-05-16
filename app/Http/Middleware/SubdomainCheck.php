<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SubdomainCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        Auth::login(User::query()->first());

        $host = $request->getHost();
        $baseDomain = config('app.base_url');

        if (str_ends_with($host, '.' . $baseDomain)) {
            $subdomain = str_replace('.' . $baseDomain, '', $host);

            $user = User::query()->where('subdomain', $subdomain)->first();

            if ($user) {
                app()->instance('user', $user);
                return $next($request);
            }
        }

        abort(Response::HTTP_NOT_FOUND, 'Клиент не найден.');
    }
}
