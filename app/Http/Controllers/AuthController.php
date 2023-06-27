<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            $user = User::where('email', $request->email)->first();
            $currentGroup = !empty($user->group) ? $user->group->group->name : null;
            if (empty($user->client_id)) {
                if ($currentGroup != 'Administrator') {
                    Session::flash('message', 'You are not Authorized!');
                    Session::flash('alert-class', 'alert-danger');
                    return redirect('login');
                }
            }
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
