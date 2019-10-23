<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningPath extends Model
{
    public $table='learningpath';
    protected $primaryKey=['learningpath_ID'];
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'learningpath_ID','revcenter_ID','createdat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'learningpath_ID','revcenter_ID','createdat'
    // ];
}
