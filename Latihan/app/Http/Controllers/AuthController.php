<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
  public function do_login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

      
        if ($user->level == 'admin') {
            return redirect()->route('admin.home'); 
        } elseif ($user->level == 'dosen') {
            return redirect()->route('dosen.home'); 
        } elseif ($user->level == 'mahasiswa') {
            return redirect()->route('mhs.home'); 
        } elseif ($user->level == 'user') {
            return redirect()->route('user.home'); 
        } else {
            Auth::logout();
            return redirect()->route('/')->withErrors(['email' => 'Level user tidak valid']);
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ])->withInput();
}


    // Tampilkan form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function do_register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'level' => 'required|in:user,mahasiswa,dosen,admin',
    ]);

    if ($validator->fails()) {
        return redirect("register")
            ->withErrors($validator)
            ->withInput();
    }

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->level = $request->level; 

    $user->save();

    return redirect('login')->with('success', 'Registrasi berhasil, silakan login.');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout.');
    }
}