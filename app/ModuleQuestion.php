<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleQuestion extends Model
{ 
    public $table='modulequestion';
    protected $primary_key = ['modulequestion_ID'];
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'modulequestion_ID','question'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'modulequestion_ID','question'
    // ];
}
