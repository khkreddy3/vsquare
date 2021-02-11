<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Config;
use Illuminate\Support\Facades\Storage;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'memid','referalid','name', 'email', 'password','mobile','referalid','memid','gender','dob','password','profile','accno','bankname','ifsccode','amount','paymenttype','address','city','state','pincode','panno','aadharno','joindate','withdraw','enddate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles){

        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }

        return false;
    }

    public function hasRole($role){

        if($this->roles()->where('name', $role)->first()){
            return true;
        }

        return false;
    }

    public function restuser()
    {
        return $this->hasMany(Settings::class, 'setuserid');
    }

    public function restinr()
    {
        return $this->hasMany(Settings::class);
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referalid', 'memid');
    }

    public function paidamount()
    {
        return $this->hasMany(Amount::class, 'memid', 'memid');
    }

    public function referralintrest()
    {
        // dd($this->id);
        // dd($this->hasMany(Referinterest::class, 'referalid', 'memid'));
        
        return $this->hasMany(Referinterest::class, 'referalid', 'memid');
    }

    public function interestdata()
    {
        return $this->hasMany(Interest::class,  'memid', 'memid');
    }
    
    public function checkstatus(){
        return $this->hasMany(Amount::class, 'beforestatus');
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
