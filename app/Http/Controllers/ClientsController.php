<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationClient;
use App\Models\Profile;
use App\Models\ApplicationUser;
use App\Models\Client;
use App\Models\ClientUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')->get();
        return view('clients', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.addclient');
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
            $client = $request->validate([

                'name' => 'required|string|max:255',
                'domain' => 'required|string|max:255',
            ]);

            $client['id'] = md5($client['name']);

            Client::create($client);

            Session::flash('message',  $client['name'] . ' Successfully Created!!!');
            Session::flash('alert-class', 'alert-success');



            return redirect('clients');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function clientuser(Request $request)
    {
        $client_id = $request->client_id;
        $user_id = $request->user_id;
        $ex = ClientUser::where('client_id', $client_id)->where('user_id', $user_id)->first();
        if ($client_id && $user_id && !$ex) {
            ClientUser::create(array(
                'client_id' => $client_id,
                'user_id' => $user_id
            ));
        }

        return redirect()->back();
    }

    public function application(Request $request)
    {
        $application_id = $request->application_id;
        $client_id = $request->client_id;

        $ex = ApplicationClient::where('client_id', $client_id)->where('application_id', $application_id)->first();
        if (!$ex) {
            ApplicationClient::create(array('client_id' => $client_id, 'application_id' => $application_id));
        }
        return redirect()->back();
    }

    public function clientuserOperator(Request $request)
    {
        $client_id = $request->client_id;
        $user_id = $request->user_id;
        User::where('client_id', $client_id)->update(array('client_id' => NULL));
        $user = User::where('id', $user_id)->first();
        $user->client_id = $client_id;
        $user->save();
        return redirect()->back();
    }

    public function clientUserAppDelete(Request $request)
    {
        $client_id = $request->client_id;
        if (!empty($request->user_id)) {
            $user_id = $request->user_id;
            $ex = ClientUser::where('client_id', $client_id)->where('user_id', $user_id)->delete();
        }
        if (!empty($request->application_id)) {
            $application_id = $request->application_id;
            $ex = ApplicationClient::where('client_id', $client_id)->where('application_id', $application_id)->delete();
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $client = DB::table('clients')
            ->where('id', '=', $id)
            ->first();
        $users = DB::table('users')->whereNull('client_id')->get();
        // $client = Client::where('name', $clients->id)->get();
        $clientUsers = ClientUser::where('client_id', $client->id)->get();
        $applications = DB::table('applications')->get();
        $clientApps = ApplicationClient::where('client_id', $client->id)->get();

        return view('show.clientview', ['client' => $client, 'clientApps' => $clientApps, 'applications' => $applications, 'clientUsers' => $clientUsers, 'users' => $users]);
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
        $client = DB::table('clients')
            ->where('id', $id)->first();
        return view('forms.updateclient', ['client' => $client]);
    }


    public function update(Request $request, $id)
    {
        //
        $reqClient = Client::where('id', $id)->first();


        if ($request->method() == 'POST') {
            $client = $request->validate([
                'name' => 'required|string|max:255',
                'domain' => 'required|string|max:255',
            ]);

            $client['subscription'] = $request->subscription ? 1 : 0;




            // if (!empty($client['photo'])) {
            //     $profile['photo'] = $client['photo'];
            // }

            //end of setting
            $reqClient->update($client);


            Session::flash('message',  $client['name'] . ' Successfully Updated!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('clients');
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
            $res = DB::table('clients')
                ->where('id', $request->id)
                ->delete();

            return $res;
        }
    }
}
