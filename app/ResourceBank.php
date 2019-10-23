<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceBank extends Model
{
    public $table='resourcebank';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'resource_ID','lesson_ID','resource',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'resource_ID','lesson_ID','resource',
    // ];
}
