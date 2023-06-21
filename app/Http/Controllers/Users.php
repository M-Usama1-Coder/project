<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->select('*')
            ->get();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::where('name','!=','SuperAdmin')->get();
        return view('forms.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->method() == 'POST') {
            $user = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:191|unique:users',
                'password' => 'required|string|min:6',
            ]);

            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);


            Session::flash('message', 'User ' . $user['name'] . ' Successfully Created!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('show.userview', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = DB::table('users')
        ->where('id', '=', $id)
        ->first();
        return view('forms.updateuser', ['user' => $user]);
    }

    public function change_password(Request $request, $id)
    {
        $reqUser = User::where('id', $id)->first();
        $user = $request->validate([
            'password' => 'nullable|string|min:6',
            'new_password' => 'nullable|string|min:6',
        ]);
        if (Hash::check($user['password'], $reqUser->password)) {
            $password = Hash::make($user['new_password']);
            $reqUser->password = $password;
            $reqUser->save();
            Session::flash('message', 'Password Updated Successfully!');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'You have entered wrong password!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        //
        $reqUser = User::where('id', $id)->first();

        if ($request->method() == 'POST') {
            $user = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                // 'gender' => 'required',
                'designation' => 'string',
                'password' => 'nullable|string|min:6',
            ]);

            //Setting arrays

            $userDetails = array(
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
            );

            // $profile = array();



            if (!empty($user['password'])) {
                $userDetails['password'] = Hash::make($user['password']);
            }
            //end of setting
            $reqUser->update($userDetails);
            // $reqUser->profile->update($profile);

            Session::flash('message', 'User ' . $user['first_name'] . ' Successfully Updated!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        if ($request->method() == 'POST') {
            $res = User::where('id', $request->id)->delete();
            echo $res;
        }
    }
}
