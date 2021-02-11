<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Settings;
use DateTime;
use App\User;
use App\Role;
use App\Amount;
use Gate;
use DB;
use Auth;
use Validator;
use App\Interest;
use Carbon\Carbon;
use App\Referinterest;
use Illuminate\Support\Facades\Crypt;
// where to updte user image
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function reference()
    {
        $id = Auth::user();
        $users = User::with('referrals')->with('paidamount')->where('referalid',$id->memid)->where('userstatus', '1')->get();
        foreach ($users as $key => $value) {
            # code...
            foreach ($value->paidamount as $skey => $svalue) {
                # code...
                $value->amountdetails += $svalue->amount;
            }
        }
        
          return view('reference')->with('users', $users);
     
    }
    public function view($id)
    {
       
        $encryid = Crypt::decryptString($id);
        $user = User::where(["id"=>$encryid])->with('paidamount')->where('userstatus', '1')->first();

        foreach ($user as $key => $value) {
            # code...
            foreach ($value->paidamount as $skey => $svalue) {
                # code...
                $value->amountdetails += $svalue->amount; 
            }
        }
        return view('view',compact('user'));
    }


    public function myProfile()
    {
        $id = Auth::guard()->user()->id;
        $user = User::where(["id"=>$id])->with('paidamount')->where('userstatus', '1')->first();

        if($user){
            foreach ($user->paidamount as $tkey => $tvalue) {
                $user->amountdetails += $tvalue->amount; 
            }
        }
        return view('auth.myprofile',compact('user'));
    }

    public function withdrawaccept(Request $request,$id){
        // print_r($request['withdraw'][0]);exit;
        $id = Auth::guard()->user()->memid;
        $user = Amount::find($id);
        // print_r($request['id']);exit;
        $user = Amount::with('paidamount')->where(["id"=>$request['id']])->first();     
        $user->beforestatus = 0;
        $user->save();
        //return view('auth.myprofile',compact('user')); 
        return redirect()->back();
    }

    public function updateProfile(Request $request){

        $id = Auth::guard()->user()->id;

        $filePath=$request->old_image;
        if($request->file('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/profile/'), $imageName);
            $filePath = url('uploads/profile/'.$imageName);
        }
        
        $slider = $request->all();
        $slider["name"] = ucwords($request->name);
        $slider['image']  = $filePath;
        
        User::find($id)->update($slider);
        return redirect()->route('admin.myprofile')->with('success','You have successfully Updated.');
    }


    public function userinterest(Request $request){
           return view('income');
    }
    public function getdatabyweeklist()
    {
        //
        $authid = Auth::user();
        $jdate = Carbon::now();
        $joindate = Auth::user()->joindate;
        $date = new \DateTime($jdate);
        $week = $date->format("W");
        for($i=$week;$i >= 1; $i--){
        $year = date('Y');
        $dto = Carbon::now();
        $dto->setISODate($year, $i);
        $ret['week_start'] = $dto->startOfWeek(Carbon::MONDAY);
        $startDate = new DateTime($ret['week_start']);
        // print_r($startDate->format('Y-m-d'));exit;
        $data['start'] = $startDate->format('Y-m-d');
        // $dto->modify('+6 days');
        $ret['week_end'] = $dto->endOfWeek(Carbon::FRIDAY);
        $endDate = new DateTime($ret['week_end']);
        $data['end'] = $endDate->format('Y-m-d');
        $retdata = (object) $data;
        // print_r($retdata);exit;
        $interestsum = 0;
        $users = User::where('id',$authid->id)->first();
        // print_r($users->memid);exit;
        $Interest = Interest::where('memid',$users->memid)->where('pending' , 1)->where('status' , 1)->where('paid' , 1)->where('generate' , 0)->whereBetween('date',[$retdata->start,$retdata->end])->get();
        // print_r($Interest);
        foreach ($Interest as $skey => $svalue) {
            # code...
            $interestsum += $svalue->dayinterest; 
        }
        $Interestsum = number_format((float)$interestsum, 2, '.', '');
       
        
        // return $Referinterestsum;
        $class = "text-muted font-weight-bold";
        $class1 = "mt-3 mb-0";
        $class2 = "text-sm mt-1 mb-0";
        $class3 = "invest";
        if($Interestsum>0){
        $p = '<div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed" ><div class="timeline-block">
        <span class="timeline-step badge-danger"><i class="ni ni-money-coins"></i></span><div class="timeline-content" >';
        $p .= "<small class=".$class.">WEEK- $i :-  $retdata->start - $retdata->end</small>";
        $p .= "<h5 class=".$class1."><span class=".$class3.">Total Amount :- Rs. $Interestsum </span></h5>";
        // $p .= "<p class=".$class2.">Rs. $Interestsum</p>";
        $p .='</div></div></div>';
        print_r($p);
        }
        }
        exit;
        // return $p;
    }

    public function getdatabyweeklistRefer()
    {
        //
        $authid = Auth::user();
        $jdate = Carbon::now();
        $joindate = Auth::user()->joindate;
        $date = new \DateTime($jdate);
        $week = $date->format("W");
        for($i=$week;$i >= 1; $i--){
        $year = date('Y');
        $dto = Carbon::now();
        $dto->setISODate($year, $i);
        $ret['week_start'] = $dto->startOfWeek(Carbon::MONDAY);
        $startDate = new DateTime($ret['week_start']);
        // print_r($startDate->format('Y-m-d'));exit;
        $data['start'] = $startDate->format('Y-m-d');
        // $dto->modify('+6 days');
        $ret['week_end'] = $dto->endOfWeek(Carbon::FRIDAY);
        $endDate = new DateTime($ret['week_end']);
        $data['end'] = $endDate->format('Y-m-d');
        $retdata = (object) $data;
        // print_r($retdata);exit;
        $users = User::where('id',$authid->id)->first();
        // print_r($users->referalid);exit;
        $referalsum = 0;
        $Referinterest = Referinterest::where('referalid',$users->memid)->where('pending' , 1)->where('status' , 1)->where('paid' , 1)->where('generate' , 0)->whereBetween('date',[$retdata->start,$retdata->end])->get();
        foreach ($Referinterest as $skey => $svalue) {
            # code...
            $referalsum += $svalue->dayrefinterest; 
        }
        $Referinterestsum = number_format((float) $referalsum, 2, '.', '');
       
        $class = "text-muted font-weight-bold";
        $class1 = "mt-3 mb-0";
        $class2 = "text-sm mt-1 mb-0";
        $class3 = "invest";
        if($Referinterestsum>0){
        $q = '<div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed" ><div class="timeline-block">
        <span class="timeline-step badge-danger"><i class="ni ni-money-coins"></i></span><div class="timeline-content" >';
        $q .= "<small class=".$class.">WEEK - $i :-  $retdata->start - $retdata->end</small>";
        $q .= "<h5 class=".$class1."><span class=".$class3.">Total Amount :- Rs. $Referinterestsum </span></h5>";
        // $q .= "<p class=".$class2.">Rs. $Referinterestsum</p>";
        $q .='</div></div></div>';
        print_r($q);
        }
        }
        exit;
        // return $p;
    }
    

    
    public function invoice()
    {
        
        
          return view('invoice');
     
    }
    public function getuserdatabyweekarray(Request $request)
    {
        $authid = Auth::user();
        // dd($id);
        $year = date('Y');
        $dto = Carbon::now();
        $dto->setISODate($year, $request->week);
        $ret['week_start'] = $dto->startOfWeek(Carbon::MONDAY);
        $createDate = new DateTime($ret['week_start']);
        $date['start'] = $createDate->format('Y-m-d');
        $dto->modify('+6 days');
        $ret['week_end'] = $dto->endOfWeek(Carbon::FRIDAY);
        $createDate = new DateTime($ret['week_end']);
        $date['end'] = $createDate->format('Y-m-d');
        $retdata = (object) $date;
        $users = User::where('memid',$authid->memid)->with('referralintrest')->with('interestdata')->with('paidamount')->where('userstatus', '1')->first();
        // printr($users);exit;
        $div = '';   
            foreach ($users as $key => $value) {
                # code...
                foreach ($value->paidamount as $fkey => $fvalue) {
                    # code...
                    $value->amountdetails += $fvalue->amount; 
                }
                $getuserrefereal = $this->getuserrefereal($value->memid,$retdata);
                $getuserinterest = $this->getuserinterest($value->memid,$retdata);
                // if($getuserrefereal != '0' && $getuserinterest != '0'){
                    if($getuserinterest != '0'){
                    $div .= "<tr>";
                    $div .= "<td>".$value->memid."</td>";
                    $div .= "<td>".$value->name."</td>";
                    $div .= "<td>".$value->amountdetails."</td>";
                    $div .= "<td>".$getuserinterest."</td>";
                    $div .= "<td>".$getuserrefereal."</td>";
                    $div .= "<td>".($getuserinterest + $getuserrefereal)."</td>";
                    $div .= "<tr>";
                }
            }
        
        

        // dd($request->all());
        return $div;
        // dd($ret);
    }

   
        
    public function getuserrefereal($id,$datearray)
    {       
        // dd($id);
        $referalsum = 0;
        $Referinterest = Referinterest::where('referalid',$id)->whereBetween('date',[$datearray->start,$datearray->end])->get();
        
        foreach ($Referinterest as $skey => $svalue) {
            $referalsum += $svalue->dayrefinterest;
        }
        $Referinterestsum = number_format((float) $referalsum, 2, '.', '');
        return $Referinterestsum;

    }


    public function getuseruserinterest($id,$datearray)
    {       
        // dd($id);
        $referalsum = 0;
        $Interest = Interest::where('memid',$id)->whereBetween('date',[$datearray->start,$datearray->end])->get();
        foreach ($Interest as $skey => $svalue) {
            # code...
            $referalsum += $svalue->dayinterest; 
        }
        $Referinterestsum = number_format((float)$referalsum, 2, '.', '');
        //dd($Interest);
        return $Referinterestsum;

    }

    public function getuserdatabyweek(Request $request)
    {
        //
        $year = date('Y');
        $dto = Carbon::now();
        $dto->setISODate($year, $request->week);
        $ret['start'] = $dto->startOfWeek(Carbon::MONDAY);
        $createDate = new DateTime($ret['start']);
        $date['week_start'] = $createDate->format('Y-m-d');
        $dto->modify('+6 days');
        $ret['end'] = $dto->endOfWeek(Carbon::FRIDAY);
        $createDate = new DateTime($ret['end']);
        $date['week_end'] = $createDate->format('Y-m-d');
        return $date;
        // dd($ret);
    }

    public function getuserdatabyweeklist()
    {
        //
        $jdate = '2020-12-30';
        $joindate = Auth::user()->joindate;
        $date = new \DateTime($jdate);
        $week = $date->format("W");
        $p = "<option value='0'>Select Week</option>";
        for($i=1;$i <= $week; $i++){
            $p .= "<option value=".$i.">Week ".$i."</option>";
        }
       
        return $p;
    }


}