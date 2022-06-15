<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Data User',
            'user' => User::orderBy('id_user', 'desc')->get(),
        ];
        return view('user.user',$data);
    }

    public function tambah(Request $r)
    {
        $data = [
            'username' => $r->username,
            'nama' => $r->nama,
            'password' => bcrypt($r->password),
            'role_id' => $r->role_id,
            'is_active' => 1,
        ];
        User::create($data);
        return redirect()->route('user')->with('sukses', 'Berhasil tambah user');
    }

    public function edit(Request $r)
    {
        $data = [
            'nama' => $r->nama,
            'role_id' => $r->role_id,
            'is_active' => $r->is_active,
        ];

        User::where('id_user', $r->id_user)->update($data);
        return redirect()->route('user')->with('sukses', 'Berhasil ubah user');
    }

    public function hapus(Request $r)
    {
        User::where('id_user', $r->id_user)->delete();
        return redirect()->route('user')->with('sukses', 'Berhasil hapus user');
    }
}
