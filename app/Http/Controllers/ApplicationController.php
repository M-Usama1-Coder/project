<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Profile;
use App\Models\ApplicationUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = DB::table('applications')->get();
        return view('applications', ['applications' => $applications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.addapplication');
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
            $application = $request->validate([

                'name' => 'required|string|max:255',
                'sp_sso_url' => 'string',
                'sp_entity_id' => 'required|string',
                'certificate_key' => 'string|nullable',
                'certificate' => 'string|nullable'
            ]);
            $application['id'] = md5($application['sp_entity_id']);

            Application::create($application);

            Session::flash('message', 'Application ' . $application['name'] . ' Successfully Created!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('applications');
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
        $application = Application::where('id', $id)->first();
        $userApps = ApplicationUser::where('application_id', $application->id)->get();
        return view('show.applicationview', ['application' => $application,'userApps'=>$userApps]);
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
        $application = DB::table('applications')
            ->where('id', $id)->first();
        return view('forms.updateapplication', ['application' => $application]);
    }


    public function update(Request $request, $id)
    {
        //
        $reqApplication = Application::where('id', $id)->first();


        if ($request->method() == 'POST') {
            $application = $request->validate([
                'name' => 'required|string|max:255',
                'sp_sso_url' => 'required|string|max:255',
                'sp_entity_id' => 'required|string',
            ]);



            // if (!empty($application['photo'])) {
            //     $profile['photo'] = $application['photo'];
            // }

            //end of setting
            $reqApplication->update($application);


            Session::flash('message', 'Application ' . $application['name'] . ' Successfully Updated!!!');
            Session::flash('alert-class', 'alert-success');

            return redirect('applications');
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
            $res = DB::table('applications')
                ->where('id', $request->id)
                ->delete();

            return $res;
        }
    }
}
