<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    public function login(): Response
    {
        return Inertia::render('Auth/Login');
    }

    public function register(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        User::query()->create([
            'email' => $validated['email'],
            'name' => $validated['name'],
            'password' => $validated['password'],
        ]);

        return to_route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

   public function show(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials)) {
            $userExists = User::query()->where('email', $credentials['email'])->exists();

            if (! $userExists) {
                return back()
                    ->withErrors(['email' => 'Email tidak terdaftar.'])
                    ->onlyInput('email');
            }

            return back()
                ->withErrors(['password' => 'Kata sandi salah.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return to_route('barang.index');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home.index')->with('message', 'Successfully logged out');
    }
}