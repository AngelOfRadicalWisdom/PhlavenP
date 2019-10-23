<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class SystemUser extends Eloquent implements Authenticatable
{
    //
    use AuthenticatableTrait;
    public $table='systemusers';
    protected $primaryKey='userid';
    public $timestamps=false;
    public $incrementing=false;
}
