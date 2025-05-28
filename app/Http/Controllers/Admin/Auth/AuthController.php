<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView(): View
    {
        return view('admin.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            $mainDomain = parse_url(config('app.url'), PHP_URL_HOST);
            $subdomainUrl = $request->getScheme() . '://' . $user->subdomain . '.' . $mainDomain . '/profile';

            return redirect()->to($subdomainUrl);
        }

        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ])->onlyInput('email');
    }

    public function registerView(): View|RedirectResponse
    {
        return view('admin.auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        try {
            if (!Auth::check()) {
                $validated = $request->validate([
                    'email' => ['required', 'email', 'unique:users,email'],
                    'country_code' => ['required', 'string'],
                    'phone_number' => ['required', 'string'],
                    'password' => ['required', 'confirmed'],
                ]);

                $user = User::query()->create([
                    'step' => 1,
                    'email' => $validated['email'],
                    'country_code' => $validated['country_code'],
                    'phone_number' => $validated['phone_number'],
                    'password' => Hash::make($validated['password']),
                ]);

                Auth::login($user);
            } else if (Auth::user()->step == 1) {
                $validated = $request->validate([
                    'first_name' => ['required', 'string', 'max:255'],
                    'last_name' => ['required', 'string', 'max:255'],
                ]);

                Auth::user()->update([
                    'step' => 2,
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                ]);
            } else if (Auth::user()->step == 2) {
                $validated = $request->validate([
                    'subdomain' => ['required', 'string', 'regex:/^[a-zA-Z\-]+$/', 'unique:users,subdomain'],
                ]);

                Auth::user()->update([
                    'step' => 3,
                    'subdomain' => $validated['subdomain'],
                ]);
            } else if (Auth::user()->step == 3) {
                Auth::user()->update([
                    'step' => 4,
                ]);
            }
        } catch (Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }

        if (Auth::user()->step != 4) {
            return back();
        }

        $user = Auth::user();
        $mainDomain = parse_url(config('app.url'), PHP_URL_HOST);
        $subdomainUrl = $request->getScheme() . '://' . $user->subdomain . '.' . $mainDomain . '/profile';

        return redirect()->to($subdomainUrl);
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('admin.auth.login');
    }
}
