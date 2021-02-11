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
use App\Withdraw;
use App\Settings;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class WithdrawController extends Controller
{
    public function index(){

        // $users = User::with('referrals')->with('paidamount')->where('beforestatus', 0)->where('userstatus', '1')->get();
        $users= DB::table('users')->join('amountdetails','amountdetails.memid','users.memid')->where('beforestatus', 0)->where('status','1')->where('userstatus', '1')->get();
        // print_r($users);exit;
        
        return view('admin.withdraw.index',compact('users'));
    }
    public function withdrawaccept(Request $request,$id){
        //  dd($id);
        $user = Amount::find($id);
        // dd($user);
        // $user = DB::table('users')->join('amountdetails','amountdetails.memid','users.memid')->where(["memid"=>$request['memid']])->first();
        $users = Amount::where(["id"=>$request['id']])->first();
        // dd($users);
        $users->status = 0;    
        $users->save();
        // return redirect()->route('admin.users.index',$user->id)->with("success","User created successfully");
        return redirect()->back();
    }
}
