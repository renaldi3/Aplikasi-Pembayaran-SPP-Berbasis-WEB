<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{
  
    public function login()
    {
        return view('login.login');
    }

    public function logins()
    {
        return view('login.logins');
    }


    public function autentikasi(Request $request) 
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        

        if (Auth::guard('petugas')->attempt($credentials)){
            $request->session()->regenerate();

            Alert::success('Login Berhasil', 'Selamat Datang Di Aplikasi Pembayaran SPP');

            return redirect()->intended('dashboard');

        }else {
            return back()->withErrors([
            'username' => 'Username / Password Mungkin Salah?.',
            ])->onlyInput('username',);
        }

           
    }
    
    public function autentikasis(Request $request) 
    {
        $credentials = $request->validate([
            'nis' => ['required'],
            'password' => ['required'],
        ]);
        

        if (Auth::guard('siswa')->attempt($credentials)){
            $request->session()->regenerate();

            Alert::success('Login Berhasil', 'Selamat Datang Di Aplikasi Pembayaran SPP');

            return redirect()->intended('dashboard');

        }
            return back()->withErrors([
            'nis' => 'NIS / Password Anda Mungkin Salah?.',
            ])->onlyInput('nis',);
    }



    public function logout(Request $request)
    {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
    
    Alert::success('Logout Berhasil');

    return redirect()->route('landing');
    }

    
}
