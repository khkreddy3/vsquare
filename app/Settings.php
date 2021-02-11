<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'appname','applogo','setuserid','interests','referalinterests', 'status'
    ];

    public function restuser()
    {
        return $this->hasMany(User::class, 'id', 'memid');
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

