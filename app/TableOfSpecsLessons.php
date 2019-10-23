<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableofSpecsLessons extends Model
{
    public $table='tableofspecslesson';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'tableofspecs_ID','lesson_ID','questionsnumber','timer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // public $hidden = [
    //     'tableofspecs_ID','lesson_ID','questionsnumber','timer'
    // ];

}
