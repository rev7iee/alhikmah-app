<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        // Jika sudah login, balikkan langsung ke dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    // Memproses data form login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Memproses Logout (Mengatasi masalah stuck loading)
    public function logout(Request $request)
    {
        // 1. Lakukan logout dari fasad Auth
        Auth::logout();

        // 2. Bersihkan semua data session saat ini
        $request->session()->invalidate();

        // 3. Buat token CSRF baru agar session lama benar-benar mati
        $request->session()->regenerateToken();

        // 4. Alihkan ke halaman login dengan redirect mentah agar terhindar dari loop cache browser
        return redirect('/admin-login');
    }
}