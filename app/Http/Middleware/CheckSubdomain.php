<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckSubdomain
{
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $baseDomain = config('app.base_url');

        if (str_ends_with($host, '.' . $baseDomain)) {
            $subdomain = str_replace('.' . $baseDomain, '', $host);

            if (auth()->check()) {
                $authUserSubdomain = auth()->user()->subdomain;

                if ($authUserSubdomain !== $subdomain) {
                    $correctUrl = $request->getScheme() . '://' . $authUserSubdomain . '.' . $baseDomain . $request->getRequestUri();
                    return redirect()->to($correctUrl);
                }

                app()->instance('user', auth()->user());
                return $next($request);
            }

            $user = User::query()->where('subdomain', $subdomain)->first();

            if ($user) {
                app()->instance('user', $user);
                return $next($request);
            }
        }

        abort(Response::HTTP_NOT_FOUND, 'Клиент не найден.');
    }
}
