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
            return redirect()->intended('/profile');
        }

        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ])->onlyInput('email');
    }

    public function registerView(): View
    {
        return view('admin.auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'email' => ['required', 'email', 'unique:users,email'],
                'country_code' => ['required', 'string'],
                'phone_number' => ['required', 'string'],
                'password' => ['required', 'confirmed'],
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'domain' => ['required', 'string', 'regex:/^[a-zA-Z\-]+$/', 'unique:users,domain'],
            ]);

            $user = User::query()->create([
                'email' => $validated['email'],
                'country_code' => $validated['country_code'],
                'phone_number' => $validated['phone_number'],
                'password' => Hash::make($validated['password']),
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'domain' => $validated['domain'],
            ]);

            Auth::login($user);
        } catch (Exception $e) {
            return back()->withErrors($e);
        }

        return redirect()->intended('/profile');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('admin.auth.login');
    }
}
