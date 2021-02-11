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

class UserController extends Controller
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
        
        $users = User::with('referrals')->with('paidamount')->where('userstatus', '1')->get();
        
        foreach ($users as $key => $value) {
            # code...
            foreach ($value->paidamount as $skey => $svalue) {
                # code...
                $value->amountdetails += $svalue->amount; 
            }
        }
                
        return view('admin.users.index',compact('users'));

    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("ASd");
        $users = User::where('userstatus', '1')->get();
        return view('admin.users.create',compact('users'));
    }
    public function updaterecharge(Request $request,$id){
        //  dd($id);
        $user = User::find($id);

        $user = DB::table('amountdetails')->where('id','=', $user)->insert([
            'memid'		=>	$user->memid,
            'amount'	=>	$request->amount,
            'paymentrechargetype'		=>	$request->paymentrechargetype,
            'payrechargerecpt'		=>	$request->payrechargerecpt,
            'paid_date'			=>	date("Y-m-d")
            ]);
        return redirect()->back();
    }
    public function updaterecpt(Request $request,$id){
        // dd($id);
        $user = User::find($id);     
        $user->amount = request('amount');
        $user->paymenttype = request('paymenttype');
        $user->payrecpt = request('payrecpt');    
        $user->save();
        return redirect()->route('admin.users.view',$user->id)->with("success","User created successfully");
    }
    
    public function withdrawaccept(Request $request,$id){
        // dd($id);
        // $user = User::find($id); 
        $user = Amount::with('paidamount')->where(["id"=>$request['withdraw'][0]])->first();     
        $user->status = 0;    
        $user->save();
        return redirect()->route('admin.users.index',$user->id)->with("success","User created successfully");
    }
    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = Settings::first();
        // dd($users->setuserid);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'referalid' => 'required'
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator);     
        }
        
            $data = $request->all();
            
            $input['name'] = $data['name'];
            $input['mobile'] = $data['mobile'];
            $input['email'] = $data['email'];
            $input['password'] = bcrypt($data['password']);
            $input['referalid'] = $data['referalid'];
                
            $result = User::create($input);
            
            $memid = $users->setuserid.str_pad( $result->id, 4, "010", STR_PAD_LEFT);
            // dd($memid);
            User::where('id',$result->id)->update(["memid"=>$memid]);

            return redirect()->route('admin.users.adddetails',$memid)->with("success","User created successfully");
    }

    public function adddetails($id)
    {
        
        $user = User::where('memid','=',$id)->first();
        //dd($user);
        return view('admin.users.adddetails', compact('user'));
    }

    public function submitdetails(Request $request,$id)
    {
        // dd("asdsa");
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator);     
        }
        
        $user = User::find($id);
        $user->memid = request('memid');
        $user->name = request('name');
        $user->referalid = request('referalid');
        $user->mobile = request('mobile');
        $user->gender = request('gender');
        $user->dob = request('dob');
        $user->email = request('email');
        $user->accno = request('accno');
        $user->bankname = request('bankname');
        $user->ifsccode = request('ifsccode');
        // $user->amount = request('amount');
        // $user->paymenttype = request('paymenttype');
        // $user->payrecpt = request('payrecpt');
        $user->address = request('address');
        $user->city = request('city');
        $user->state = request('state');
        $user->pincode = request('pincode');
        $user->panno = request('panno');
        $user->aadharno = request('aadharno');
        $user->joindate = request('joindate');
        $user->save();

        $user = DB::table('amountdetails')->where('id','=', $user)->insert([
            'memid'		=>	$user->memid,
            'amount'	=>	$request->amount,
            'paymentrechargetype'		=>	$request->paymentrechargetype,
            'payrechargerecpt'		=>	$request->payrechargerecpt,
            'paid_date'			=>	date("Y-m-d")
            ]);

        return redirect()->route('admin.users.index')->with("success","User created successfully");
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.view', compact('user'));
    }

    public function view($id)
    {
        $user = User::with('paidamount')->where(["id"=>$id])->first();
        //dd( $user->amount->beforestatus );
        if($user){
            foreach ($user->paidamount as $tkey => $tvalue) {
                $user->amountdetails += $tvalue->amount; 
            }
        }
        return view('admin.users.view',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::where(["id"=>$id])->first();
        $roles = Role::all();
        
        //$albums = User::where(['type'=>'photo'])->get();
        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $user = User::find($id);
        $user->memid = request('memid');
        $user->name = request('name');
        $user->referalid = request('referalid');
        $user->mobile = request('mobile');
        $user->gender = request('gender');
        $user->dob = request('dob');
        $user->email = request('email');
        //no website
        if ($request->file('profile')) {
            $path = $request->file('profile')->store('profile');
            $user->profile = isset($path) ? $path : '';
        }
        $user->accno = request('accno');
        $user->bankname = request('bankname');
        $user->ifsccode = request('ifsccode');
        // $user->amount = request('amount');
        // $user->paymenttype = request('paymenttype');
        // $user->payrecpt = request('payrecpt');
        $user->address = request('address');
        $user->city = request('city');
        $user->state = request('state');
        $user->pincode = request('pincode');
        $user->panno = request('panno');
        $user->aadharno = request('aadharno');
        $user->joindate = request('joindate');
        $user->save();
        //$user->roles()->sync($request->roles);
       
        return redirect()->route('admin.users.view',$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    
}
