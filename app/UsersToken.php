<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersToken extends Model
{
    public $table='usertokens';
    public $timestamps=false;
    public $incrementing=false;

    protected $fillable = [
        'user_ID','token'
    ];

    protected $hidden = [
        'password','token'
    ];
}
