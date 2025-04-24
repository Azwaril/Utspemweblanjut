<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Register Page
    public function showRegister() {
        return view('auth.register');
    }

    // Register Action
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    
        // ✅ Simpan user baru ke dalam variabel
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // default role
        ]);
    
        // ✅ Login otomatis
        Auth::login($user);
    
        // ✅ Redirect ke halaman utama
        return redirect('/')->with('success', 'Pendaftaran berhasil! Selamat datang, ' . $user->name);
    }
    

    // Show Login Page
    public function showLogin() {
        return view('auth.login');
    }

    // Login Action
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Berhasil Login');
        }

        return back()->withErrors(['email' => 'Email atau Password salah']);
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil Logout');
    }
}
