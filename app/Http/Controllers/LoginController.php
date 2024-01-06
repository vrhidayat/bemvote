<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $check = $request->validate([
            'nim' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($check)) {
            $request->session()->regenerate();
            return redirect()->intended('/mahasiswa');
        }
        return back()->with('loginError', 'Login Failed.');
    }

    public function logout(Request $request)
    {
        Auth::logout($request);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/signin');
    }
}
