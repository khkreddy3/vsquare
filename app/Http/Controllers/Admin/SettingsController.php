<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = settings::where('status', '1')->first();
        return view('admin.settings',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateinterest(Request $request)
    {
            $settings = Settings::first();
            $settings->interests = request('interests');
            $settings->referalinterests = request('referalinterests');
            $settings->save();
        return redirect()->back();
    }

    public function setuserid(Request $request)
    {
            $settings = Settings::with('restuser')->first();
            $settings->setuserid = request('setuserid');
            $settings->save();
        return redirect()->back();
        // return redirect()->route('admin.users.resetuserid');
    }

    

    public function updateapplication(Request $request)
    {
            $settings = Settings::first();
            if( $request->hasFile('applogo')) {
                $image = $request->file('applogo');
                $path = 'public/logo/';
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);
                
            }
            $settings->appname = request('appname');
            $settings->applogo = $path.''.$filename;
            $settings->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
