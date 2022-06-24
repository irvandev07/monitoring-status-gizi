<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view ('auths.login');
    }

    public function postloginpus(Request $request)
    {
        
        if (Auth::attempt($request->only('username', 'password'))) {
    		return redirect('/dashboard')->with('Sukses','Berhasil Login');
    	}
    	else
    	{
    		return redirect('/login')->with('Alert','Password atau Username Salah !');
    	}
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('Sukses', 'Anda Berhasil Logout');
    }
    public function lupaPass(){
        return view('auths.forgotPassword');
    }
}