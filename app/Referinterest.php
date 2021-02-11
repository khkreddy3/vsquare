<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Referinterest extends Model
{
    protected $table = 'referalinterests';

    protected $fillable = [
        'memid','dayrefinterest', 'weekday', 'date','paid','generate','pending','status','referalid'
    ];

    public function restinr()
    {
        return $this->hasMany(Settings::class);
    }

    public function referrals()
    {
        return $this->belond(User::class, 'referalid', 'memid');
    }

    public function userdata()
    {
        return $this->belongsTo('App\User','memid','memid');
    }
   

    
}

