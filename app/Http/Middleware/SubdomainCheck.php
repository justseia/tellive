<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SubdomainCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        $baseUrl = config('app.base_url');
        $host = $request->getHost();
        $parts = explode('.', $host);
        $hasSubdomain = count($parts) > 2;
        $baseDomain = config('app.base_url');

        if (!$hasSubdomain && !auth()->check()) {
            return redirect()->route('admin.auth.loginView');
        } else if (!$hasSubdomain && auth()->check()) {
            $subdomain = auth()->user()->subdomain;
            $url = "https://{$subdomain}.{$baseUrl}";
            return redirect()->to($url);
        }

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
