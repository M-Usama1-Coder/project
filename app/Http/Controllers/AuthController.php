<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function redirection($path = null)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = auth()->user();
        $currentGroup = !empty($user->group) ? $user->group->group->name : null;
        if ($currentGroup == 'Administrator') {
            return redirect('admin/users');
        } else {
            $client = Client::where('id', $user->client_id)->first();
            return redirect($client->domain . '/users');
        }
    }

    public function login($path = null)
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function authenticate(Request $request, $path = null)
    {
        if (Auth::check()) {
            return redirect($path . '/');
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
                } else {
                    $preURL = 'admin';
                }
            }
            $client = Client::where('id', $user->client_id)->first();
            if ($client) {
                $preURL = $client->domain;
                if (!$client->subscription) {
                    Session::flash('message', 'You are not subscribe!');
                    Session::flash('alert-class', 'alert-danger');
                    return redirect('login');
                }
            }

            if (Auth::attempt($credentials)) {
                return redirect()->intended($preURL . '/');
            } else {
                Session::flash('message', 'Invalid Email or Password!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('login');
            }
        }
    }

    public function signout($path)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function signup()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('registration');
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $client = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
        ]);
        $client['id'] = md5($client['name']);
        $dbCLient = Client::create($client);

        $user = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $dataArray = [
            'id' => md5($user['email']),
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            'client_id' => md5($client['name'])
        ];
        $user = User::create($dataArray);

        ClientUser::create(array(
            'client_id' => md5($client['name']),
            'user_id' => md5($user['email']),
        ));

        return redirect('login');
    }
}
