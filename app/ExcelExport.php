<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Interest;
use Carbon\Carbon;
use App\Referinterest;
use App\Amount;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExport implements FromCollection
{
   

    private $collection;

    public function __construct($arrays)
    {
        $output = [];

        $users = User::with('referralintrest')->with('interestdata')->with('paidamount')->where('userstatus', '1')->get()->toArray();
        $day = Carbon::now()->format('l');
        $dayarray = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
        $data = array();
        foreach ($users as $key => $value) {
            // print_r($value);exit;
            $value['amountdetails'] = 1;
            $value['referalsum'] = 1;
            $value['interestsum'] = 1;
            foreach ($value['paidamount'] as $tkey => $tvalue) {
                $value['amountdetails'] += ($tvalue['amount']) ? $tvalue['amount'] : 0; 
            }
           
            # code...
            foreach ($value['referralintrest'] as $skey => $svalue) {
                # code...
                $value['referalsum'] += $svalue['dayrefinterest']; 
            }
            
            $inttt = $value['referalsum'];
            $value['referalsum'] = number_format((float)$inttt, 2, '.', '');
            foreach ($value['interestdata'] as $ikey => $ivalue) {
                # code...
                $value['interestsum'] += $ivalue['dayinterest']; 
            }
            $intr = $value['interestsum'];
            $value['intrest'] = number_format((float)$intr, 2, '.', '');
            unset($value['referralintrest']);
            unset($value['paidamount']);
            unset($value['interestdata']);
            
            // $data[] = $value;
            
        }
        // $data = (array) $value;
        // print_r($data);exit;
         $this->collection = collect($value);
    }

    public function collection()
    {
        return $this->collection;
    }
}