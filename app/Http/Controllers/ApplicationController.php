<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $applications = Application::all();
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
                'title' => 'required|string|max:255',
                'url' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            Application::create($application);

            Session::flash('message', 'Application ' . $application['title'] . ' Successfully Created!!!');
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
        return view('show.applicationview', ['application' => $application]);
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
        $application = Application::where('id', $id)->first();
        return view('forms.updateapplication', ['application' => $application]);
    }


    public function update(Request $request, $id)
    {
        //
        $reqApplication = Application::where('id', $id)->first();
        

        if ($request->method() == 'POST') {
            $application = $request->validate([
                'title' => 'required|string|max:255',
                'url' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

         
        
            // if (!empty($application['photo'])) {
            //     $profile['photo'] = $application['photo'];
            // }
            if ($request->file('photo')) {
                $imagePath = $request->file('photo');
                $filename = time() . uniqid() . '_img' . $imagePath->getClientOriginalName();
                $request->file('photo')->storeAs('profile', $filename, 'public_uploads');
                $application['photo'] = $filename;
            }

            //end of setting
            $reqApplication->update($application);

            Session::flash('message', 'Application ' . $application['title'] . ' Successfully Updated!!!');
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
            $res = Application::where('id', $request->id)->delete();
            return $res;
        }
    }
}
