<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (session('is_admin')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin-pages.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $adminUsername = config('admin.username');
        $adminPasswordHash = config('admin.password_hash');

        $isValid = $credentials['username'] === $adminUsername
            && Hash::check($credentials['password'], $adminPasswordHash);

        if (! $isValid) {
            return back()
                ->withErrors(['username' => 'Username atau password salah.'])
                ->withInput($request->except('password'));
        }

        Session::put('is_admin', true);

        return redirect()->route('admin.dashboard')->with('status', 'Selamat datang kembali!');
    }

    public function logout()
    {
        Session::forget('is_admin');

        return redirect()->route('admin.login')->with('status', 'Anda telah logout.');
    }
}

