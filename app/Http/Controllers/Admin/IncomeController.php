<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use App\Interest;
use Carbon\Carbon;
use App\Referinterest;
use App\Amount;
use App\Settings;
use DateTime;
use Auth;
use App\Exports\BulkExport;
use Maatwebsite\Excel\Facades\Excel;

class IncomeController extends Controller
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
            $users = User::with('referralintrest')->with('interestdata')->with('paidamount')->where('userstatus', '1')->get();
            $day = Carbon::now()->format('l');
            $dayarray = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
            foreach ($users as $key => $value) {
                
                foreach ($value->paidamount as $tkey => $tvalue) {
                    $value->amountdetails += $tvalue->amount; 
                }
               
                # code...
                foreach ($value->referralintrest as $skey => $svalue) {
                    # code...
                    $value->referalsum += $svalue->dayrefinterest; 
                }
                
                $inttt = $value->referalsum;
                $value->referalsum = number_format((float)$inttt, 2, '.', '');
                foreach ($value->interestdata as $ikey => $ivalue) {
                    # code...
                    $value->interestsum += $ivalue->dayinterest; 
                }
                $intr = $value->interestsum;
                $value->intrest = number_format((float)$intr, 2, '.', '');
            }
            
        return view('admin.income.index',compact('users'));
    }

    public function incomeexport()
    {

        return view('admin.income.incomeexport');
    }


    public function curlinsertdata(){
        $users = User::all();
       
        $user = User::with('paidamount');
        $inte_cst = DB::table('settings')->select('interests')->first();
        // dd((float)$inte_cst->interests);
        $int_float = (float)$inte_cst->interests;
        $day = Carbon::now()->format('l');
        $dayarray = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
        //sunday  or saturday not calculate   it---- yes but for testing purpose  
        if(in_array($day,$dayarray)){
            foreach ($users as $key => $value) {                
                if($value->payrecpt == '1'){
                    if($value->userstatus == 1){
                        foreach ($value->paidamount as $tkey => $tvalue) {
                            $value->amountdetails = $tvalue->amount; 
                            // dd($tvalue->amount);
                        $limitdate = date('Y-m-d', strtotime($tvalue->paid_date. ' + 1 days'));
                        if((date('Y-m-d') >= $tvalue->paid_date) && (date('Y-m-d') <= $limitdate)){
                            $intrest = new Interest();
                            $intrest->memid = $value->memid;
                            $intrest->dayinterest = 0;
                            $intrest->weekday = $day;
                            $intrest->date = date("Y-m-d");
                            $intrest->paid = 1;
                            $intrest->save();
                        }else{
                            //please check
                            // dd($int_float);
                            $intr = $value->amountdetails * $int_float / 100;
                            $interestamount = number_format((float)$intr, 2, '.', '');
                            $intrest = new Interest();
                            $intrest->memid = $value->memid;
                            $intrest->dayinterest = $interestamount;
                            $intrest->weekday = $day;
                            $intrest->date = date("Y-m-d");
                            $intrest->paid = 1;
                            $intrest->save();
                        } 
                    }}else{

                    }
                }else{
                    
                }
            }
        }
        // print_r($int_float);
    }


    public function curlrefedatad(){
        //your logic
        $users = User::all();
        $user = User::with('paidamount');
        $inte_cst = DB::table('settings')->select('referalinterests')->first();
        $int_float = (float)$inte_cst->referalinterests;
        $day = Carbon::now()->format('l');
        $dayarray = array('Monday','Tuesday','Wednesday','Thursday','Friday');
        //sunday  or saturday not calculate  
        if(in_array($day,$dayarray)){
            foreach ($users as $key => $value) {
                foreach ($value->paidamount as $tkey => $tvalue) {
                    
                if($value->payrecpt == '1'){
                    if($value->userstatus == 1){
                                $limitdate = date('Y-m-d', strtotime($tvalue->paid_date. ' + 1 days'));
                                
                                            if((date('Y-m-d') >= $tvalue->paid_date) && (date('Y-m-d') <= $limitdate)){
                                                $intrest = new Referinterest();
                                                $intrest->memid = $rvalue->memid;
                                                $intrest->dayrefinterest = 0;
                                                $intrest->weekday = $day;
                                                $intrest->date = date("Y-m-d"); 
                                                $intrest->paid = 1;
                                                $intrest->referalid = $rvalue->referalid;
                                                $intrest->save();
                                                }else{
                                                    foreach ($value->referrals as $key => $rvalue) {
                                                        foreach ($rvalue->paidamount as $fkey => $fvalue) {
                                                        // dd($fvalue->amount);
                                                    if($rvalue->memid == $value->referalid || $value->memid == 'Vsc0101' ){
                                                    //memid = refealid = false, if admin = false
                                                    }else{
                                                        // dd($value->referrals);
                                                            $limitdaterefer = date('Y-m-d', strtotime($fvalue->paid_date. ' + 1 days'));
                                                            if((date('Y-m-d') >= $tvalue->paid_date) && (date('Y-m-d') <= $limitdaterefer)){
                                                            }else{
                                                                $rvalue->amountdetails += $fvalue->amount;
                                                                $amount = $rvalue->amountdetails;
                                                                // dd($amount);
                                                                $intr = $amount * $int_float / 100;
                                                                $interestamount = number_format((float)$intr, 2, '.', '');
                                                                $intrest = new Referinterest();
                                                                $intrest->memid = $rvalue->memid;
                                                                $intrest->dayrefinterest = $interestamount;
                                                                $intrest->weekday = $day;
                                                                $intrest->date = date("Y-m-d"); // can i call u yes y two times coming ?
                                                                $intrest->paid = 1;
                                                                $intrest->referalid = $rvalue->referalid;
                                                                $intrest->save();
                                                            }
                                                        }
                                                    } }
                                                }
                                }else{
                                }
                            }else{
                    
                             }
                        }   
            }
        }
    }

    public function getdatabyweekarray(Request $request)
    {
        $year = date('Y');
        $dto = Carbon::now();
        $dto->setISODate($year, $request->week);
        $ret['week_start'] = $dto->startOfWeek(Carbon::MONDAY);
        $createDate = new DateTime($ret['week_start']);
        $date['start'] = $createDate->format('Y-m-d');
        // $dto->modify('+6 days');
        $ret['week_end'] = $dto->endOfWeek(Carbon::FRIDAY);
        $createDate = new DateTime($ret['week_end']);
        $date['end'] = $createDate->format('Y-m-d');
        $retdata = (object) $date;
        $users = User::with('referralintrest')->with('interestdata')->with('paidamount')->where('userstatus', '1')->get();
        $div = '';   
            foreach ($users as $key => $value) {
                # code...
                foreach ($value->paidamount as $fkey => $fvalue) {
                    # code...
                    $value->amountdetails += $fvalue->amount; 
                }
                $getuserrefereal = $this->getuserrefereal($value->referalid,$retdata);
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

    public function getdatabymontharray(Request $request)
    {
        $date = date_parse($request['month']);
        $ret['start'] = date('Y-' . $date['month'] . '-01');
        $ret['end'] = date('Y' .'-' . $date['month'] . '-'.date('t', strtotime($ret['start'])));
        $retdata = (object) $ret;
        $users = User::with('referralintrest')->with('interestdata')->with('paidamount')->where('userstatus', '1')->get();
        $div = '';   
            foreach ($users as $key => $value) {
                # code...
                foreach ($value->paidamount as $fkey => $fvalue) {
                    # code...
                    $value->amountdetails += $fvalue->amount; 
                }
                $getuserrefereal = $this->getuserrefereal($value->referalid,$retdata);
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


    public function getuserinterest($id,$datearray)
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

    public function getdatabyweek(Request $request)
    {
        //
        $year = date('Y');
        // $dto = new \DateTime();
        // $dto->setISODate($year, $request->week);
        // $ret['week_start'] = $dto->format('Y-m-d');
        // $dto->modify('+6 days');
        // $ret['week_end'] = $dto->format('Y-m-d');
        $dto = Carbon::now();
        $dto->setISODate($year, $request->week);
        $ret['start'] = $dto->startOfWeek(Carbon::MONDAY);
        $createDate = new DateTime($ret['start']);
        $date['week_start'] = $createDate->format('Y-m-d');
        // $dto->modify('+6 days');
        $ret['end'] = $dto->endOfWeek(Carbon::FRIDAY);
        $createDate = new DateTime($ret['end']);
        $date['week_end'] = $createDate->format('Y-m-d');
        return $date;
        // dd($ret);
    }

        public function getdatabymonth(Request $request)
    {
         $date = date_parse($request['month']);
        // $date['start'] = date('01-' . $date['month'] . '-Y');
        $date['start'] = date('Y-' . $date['month'] . '-01');
        // $date['end'] = date(date('t', strtotime($date['start'])) .'-' . $date['month'] . '-Y');
        $date['end'] = date('Y' .'-' . $date['month'] . '-'.date('t', strtotime($date['start'])));
        return $date;
        // dd($ret);
    }

    public function getdatabyweeklist()
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

    public function getReportType(Request $request)
    {
        // print_r($request->all());exit();
        $p='';
        if($request['type'] == 'week'){
        $jdate = '2020-12-30';
        $joindate = Auth::user()->joindate;
        $date = new \DateTime($jdate);
        $week = $date->format("W");
        $p = "<option value='0'>Select Week</option>";
        for($i=1;$i <= $week; $i++){
            $p .= "<option value=".$i.">Week ".$i."</option>";
        }
        $json['type'] = 'week';
        $json['data'] = $p;
        }else{
        $monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $p = "<option value='0'>Select Month</option>";
        foreach ($monthNames as $key => $value) {
            $p .= "<option value=".$value.">".$value."</option>";
        }
        $json['type'] = 'month';
        $json['data'] = $p;
        }
           return $json;
        }

        public function export() {
        return Excel::download(new BulkExport, 'bulkData.xlsx');
        }



}
