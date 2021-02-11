<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use Notifiable;
    protected $fillable = [
        'memid', 'amount','paymentrechargetype','payrechargerecpt','paid_date','beforestatus','status'
    ];
    
}
