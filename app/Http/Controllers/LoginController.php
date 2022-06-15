<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function prosesLogin(Request $r)
    {
        $username = $r->username;
        $password = $r->password;
        $id_lokasi = $r->id_lokasi;

        

        $valid = $r->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($valid)){
            if($id_lokasi == 1) {
                $title = 'Login Takemori';
                $id_lokasi = $r->session()->put('id_lokasi', 1);
                $img = "/ptagafood/logo/takemori.jpg";
            } elseif($id_lokasi == 2) {
                $title = 'Login Soondobu';
                $id_lokasi = $r->session()->put('id_lokasi', 2);
                $img = "/ptagafood/logo/soondobu.jpg";
            } else {
                $title = 'Login Admin';
                $id_lokasi = $r->session()->put('id_lokasi', 3);
                $img = "/ptagafood/logo/boxes.jpg";
            }
            $r->session()->regenerate();
            $r->session()->put('nama', strtoupper($username));
            return redirect()->intended('produk');
        } else {
            return redirect()->route('auth', ['id_lokasi' => $id_lokasi])->with('error', 'Username / password salah!');
        }
     
    }

    public function logout(Request $r)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect()->route('welcome');
    }
}
