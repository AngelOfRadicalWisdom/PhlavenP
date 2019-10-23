<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRevCenter extends Model
{
    //
    public $table='userrevcenter';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'user_ID','revcenter_ID','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // public $hidden = [
    //     'user_ID','revcenter_ID'
    // ];

    public function users(){
        return $this->hasOne('App\Users','user_ID','user_ID');
    }
    public function revcenter(){
        return $this->hasOne('App\RevCenter','revcenter_ID','revcenter_ID');
    }
}
