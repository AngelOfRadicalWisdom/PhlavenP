<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Users extends Authenticatable implements JWTSubject
{
    // use AuthenticatableTrait;
    public $table='users';
    protected $primaryKey='user_ID';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'user_ID','username','password','email','firstname','lastname','gender','isadmin','diagnostic','remember_token','mobile_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $hidden = [
        'user_ID','password','isadmin','diagnostic','remember_token'
    ];

    public function is_admin(){
        if($this->isadmin){
            return true;
        }else{
            return false;
        }
    }

    public function revcenter(){
        return $this->hasOne('App\RevCenter','revcenter_ID','revcenter_ID');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}