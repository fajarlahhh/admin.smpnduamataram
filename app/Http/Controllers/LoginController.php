<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function authenticate(Request $req)
    {
        $validate = $req->validate([
            'uid' => 'required',
            'password' => 'required',
        ]);

        $remember = ($req->remember == 'on') ? true : false;
        if (Auth::attempt(['pengguna_id' => $req->uid, 'password' => $req->password], $remember)) {
            return redirect()->intended('admin-area');
        }
        return redirect()->back()->withInput()->withErrors('ID atau Password Salah !!!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
