<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonStatus extends Model
{
    public $table='lessonstatus';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'reviewee_ID','learningpath_ID','lesson_ID','status','reviewee_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'reviewee_ID','learningpath_ID','lesson_ID','status',
    // ];
}
