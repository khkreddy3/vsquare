<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
     protected $table = 'interests';

    protected $fillable = [
        'memid','dayinterest', 'weekday', 'date','paid','generate','pending','status'
    ];

    public function restinr()
    {
        return $this->hasMany(Settings::class);
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referalid', 'memid');
    }

    public function userdata()
    {
        return $this->belongsTo('App\User','memid','memid');
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

