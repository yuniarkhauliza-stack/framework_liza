<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController 
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'username' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'min:6'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'angkatan' => ['required', 'digits:4', 'integer'],
            'kelas' => ['required', 'in:A,B,C,D'],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        User::create($validated);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showForgetPassword() {
        return view('auth.forget-password');
    }
}