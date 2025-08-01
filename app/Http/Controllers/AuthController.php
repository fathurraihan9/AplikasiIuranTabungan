<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nis_username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::guard('santri')->attempt(['nis' => $request->nis_username, 'password' => $request->password])) {
            // login berhasil
            $user = Auth::guard('santri')->user();

            return redirect()->route('santri.dashboard', ['user' => $user]);
        }

        if (Auth::guard('admin')->attempt(['username' => $request->nis_username, 'password' => $request->password])) {
            // login berhasil
            $user = Auth::guard('admin')->user();

            return redirect()->route('admin.dashboard', ['user' => $user]);
        }

        return redirect()->route('login', ['msg_err' => 'Terjadi Kesalahan Pada saat Login']);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/auth/login')->with('status', 'Anda telah logout sebagai admin.');
        }

        if (Auth::guard('santri')->check()) {
            Auth::guard('santri')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/auth/login')->with('status', 'Anda telah logout sebagai santri.');
        }

        return redirect('/auth/login');
    }
}
