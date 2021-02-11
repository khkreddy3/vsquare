<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    protected $table = 'amountdetails';

    protected $fillable = [
        'memid','amount', 'paymentrechargetype', 'payrechargerecpt','paid_date','beforestatus','status'
    ];

    public function userdata()
    {
        return $this->belongsTo('App\User','memid','memid');
    }

    public function restinr()
    {
        return $this->hasMany(Settings::class);
    }

    public function paidamount()
    {
        return $this->hasMany(User::class, 'memid', 'memid');
    }
    
    

    public function getProfileAttribute($value)
    {
        if(isset($value)){
            $imagepath = Config::get("app.appstoreurl").$value;
        }else{
            $imagepath =  asset("/public/assets/img/avatar.png");
        }
        return  $imagepath;
    }
}


