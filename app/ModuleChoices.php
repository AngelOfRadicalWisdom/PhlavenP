<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleChoices extends Model
{
    public $table='modulechoices';
    protected $primary_key = ['modulequestion_ID'];
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'modulechoice_ID','modulequestion_ID','choice','response'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'modulechoice_ID','modulequestion_ID','choice','response'
    // ];
}
