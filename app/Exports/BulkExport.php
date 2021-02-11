<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use App\Interest;
use Carbon\Carbon;
use App\Referinterest;

class BulkExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Memid',
            'name',
            'mobile',
            'email',
            'createdAt',
        ];
    }
    public function collection()
    {
        // return User::all();
        $test = User::with('referralintrest')->with('interestdata')->with('paidamount')->where('userstatus', '1')->first();
        // $test = User::with('referralintrest')->get();
        dd($test);
        return User::with('referralintrest')->with('interestdata')->with('paidamount')->where('userstatus', '1')->get();
//       return DB::table('users')

// ->select('users.memid','users.name','users.email','users.mobile','users.created_at')

// ->leftjoin('referalinterests','referalinterests.referalid','=','users.referalid')

// ->leftjoin('amountdetails','amountdetails.memid','=','users.memid')

// ->where('users.userstatus' , '1')

// ->get();
    	// $date = date_parse('October');
     //    $ret['start'] = date('Y-' . $date['month'] . '-01');
     //    $ret['end'] = date('Y' .'-' . $date['month'] . '-'.date('t', strtotime($ret['start'])));
     //    $retdata = (object) $ret;
    	// $users = User::with('referralintrest')->with('interestdata')->with('paidamount')->where('userstatus', '1')->get();
          
     //        foreach ($users as $key => $value) {
     //            # code...
     //            foreach ($value->paidamount as $fkey => $fvalue) {
     //                # code...
     //                $value->amountdetails += $fvalue->amount; 
     //            }
     //            $getuserrefereal = $this->getuserrefereal($value->referalid,$retdata);
     //            $getuserinterest = $this->getuserinterest($value->memid,$retdata);

     //                if($getuserinterest != '0'){
     //                // $div .= "<tr>";
     //                // $div .= "<td>".$value->memid."</td>";
     //                // $div .= "<td>".$value->name."</td>";
     //                // $div .= "<td>".$value->amountdetails."</td>";
     //                // $div .= "<td>".$getuserinterest."</td>";
     //                // $div .= "<td>".$getuserrefereal."</td>";
     //                // $div .= "<td>".($getuserinterest + $getuserrefereal)."</td>";
     //                // $div .= "<tr>";
     //                return [
     //        $value->memid,
     //        $value->name,
     //        $value->email,
     //        $value->mobile,
     //        $value->created_at,
     //    ];
     //            }
     //        }
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


    public function map($user): array
    {
        return [
            $user->memid,
            $user->name,
            $user->email,
            $user->mobile,
            Date::dateTimeToExcel($user->created_at),
        ];
    }


}
