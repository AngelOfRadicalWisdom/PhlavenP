<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableofSpecs extends Model
{
    public $table='tableofspecs';
    protected $primaryKey='tableofspecs_ID';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'tableofspecs_ID','revcenter_ID','type','timer','datecreated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // public $hidden = [
    //     'tableofspecs_ID','revcenter_ID','type','timer','datecreated'
    // ];
}

