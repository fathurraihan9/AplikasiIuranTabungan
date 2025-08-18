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

        if (Auth::guard('user')->attempt(['username' => $request->nis_username, 'password' => $request->password])) {
            // login berhasil
            $user = Auth::guard('user')->user();

            return redirect()->route('admin.dashboard', ['user' => $user]);
        }

        return redirect()
            ->route('login')
            ->with('msg_error', 'Silahkan masukkan NIS atau Username dengan benar');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('msg_success', 'Anda telah logout sebagai admin / ketua.');
        }

        if (Auth::guard('santri')->check()) {
            Auth::guard('santri')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('msg_success', 'Anda telah logout sebagai santri.');
        }

        return redirect()->route('admin.dashboard')->with('msg_error', 'Gagal logout');
    }
}
