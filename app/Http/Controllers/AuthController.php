<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }
        if ($request->method() == 'POST') {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('/');
            } else {
                Session::flash('message', 'Invalid Email or Password!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('login');
            }
        }
    }

    public function signout()
    {
        Auth::logout();
        return redirect('login');
    }
}
