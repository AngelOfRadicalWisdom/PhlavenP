<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevCenter extends Model
{
    public $table='revcenter';
    public $timestamps=false;
    public $incrementing=false;

    public $fillable = [
        'revcenter_ID','revcenter_name'
    ];

    // protected $hidden = [
    //     'revcenter_ID','revcenter_name'
    // ];
}
