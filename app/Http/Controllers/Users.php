<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationUserResource;
use App\Models\Application;
use App\Models\ApplicationUser;
use App\Models\Group;
use App\Models\User;
use App\Models\Profile;
use App\Models\UserGroup;
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
        $groups = DB::table('groups')
            ->get();
        return view('forms.adduser', ['groups' => $groups]);
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
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:191|unique:users',
                'password' => 'required|string|min:6',
            ]);

            $newUser = User::create([
                'id' => md5($user['email']),
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);


            Session::flash('message', 'User ' . $user['first_name'] . ' Successfully Created!!!');
            Session::flash('alert-class', 'alert-success');



            return redirect('users');
        }
    }

    public function application(Request $request)
    {
        $application_id = $request->application_id;
        $user_id = $request->user_id;

        $ex = ApplicationUser::where('user_id', $user_id)->where('application_id', $application_id)->first();
        if (!$ex) {
            ApplicationUser::create(array('user_id' => $user_id, 'application_id' => $application_id));
        }
        return redirect('users/show/' . $user_id);
    }

    public function applicationDelete(Request $request)
    {
        $application_id = $request->application_id;
        $user_id = $request->user_id;
        $ex = ApplicationUser::where('user_id', $user_id)->where('application_id', $application_id)->delete();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::where('id', $id)->first();
        $user = DB::table('users')
            ->where('id', '=', $id)
            ->first();
        $applications = DB::table('applications')->get();
        $userApps = ApplicationUser::where('user_id', $user->id)->get();
        return view('show.userview', ['user' => $user, 'applications' => $applications, 'userApps' => $userApps]);
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
        $groups = DB::table('groups')
            ->get();
        return view('forms.updateuser', ['user' => $user, 'groups' => $groups]);
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

            if ($request->group) {
                $usergroup = UserGroup::where('user_id', $id)->first();
                if ($usergroup) {
                    $usergroup->group_id = $request->group;
                    $usergroup->save();
                } else {
                    $grpArray = array('group_id' => $request->group, 'user_id' => $id, 'client_id' => 1);
                    UserGroup::insert($grpArray);
                }
            }

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
            $res = DB::table('users')
                ->where('id', '=', $request->id)
                ->delete();

            echo $res;
        }
    }
}
