<?php

namespace App\Http\Controllers;

abstract class Controller

{
    public function showLogin()
    {
        if (session('login')) {
            return redirect()->route('pelanggan.index');
        }

        return view('auth-manual.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = env('LOGIN_USER', 'admin');
        $password = env('LOGIN_PASSWORD', 'admin123');

        if (
            $request->username === $username &&
            $request->password === $password
        ) {
            $request->session()->regenerate();
            $request->session()->put('login', true);

            return redirect()->route('pelanggan.index')
                ->with('success', 'Login berhasil!');
        }

        return back()
            ->withErrors(['login' => 'Username atau password salah.'])
            ->onlyInput('username');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.manual')
            ->with('success', 'Kamu berhasil logout.');
    }
}