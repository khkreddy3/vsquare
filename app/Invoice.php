<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    
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

