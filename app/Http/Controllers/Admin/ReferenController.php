<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use Gate;
use DB;
use Auth;
use Validator;
use Session;
use App\Interest;
use Carbon\Carbon;
use App\Referinterest;
use App\Amount;
use App\Settings;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ReferenController extends Controller
{
    
    public function _construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $users = User::with('referrals')->with('paidamount')->where('userstatus', '1')->get();
        $users = $users->sortBy(function($value, $key) {
            return $value->referrals->count();
          }, SORT_NUMERIC,true);
          foreach ($users as $key => $value) {
            # code...
            foreach ($value->paidamount as $skey => $svalue) {
                # code...
                $value->amountdetails += $svalue->amount; 
            }
        }
                
        return view('admin.reference.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reference.create');
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
    public function update(Request $request, User $user)
    {
        //
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
