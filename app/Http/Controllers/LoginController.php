<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function attemptLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        unset($credentials['remember-me']);

        if (Auth::attempt($credentials, $request->filled('remember-me'))) {
            $request->session()->regenerate();
    
            $user = Auth::user();

            if ($user->role_id == 2)
                return to_route('admin.index')->with('success', 'Selamat datang kembali admin ' . $user->name . '!');

            return to_route('fund-donation.index')->with('success', 'Berhasil masuk! Selamat datang ' . $user->name . '!');
        }

        return to_route('login')->with('error', 'Gagal masuk! Silakan periksa kembali alamat e-mail dan kata sandi anda');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Keluar berhasil dilakukan!');
    }
}
