<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    public $table='lessons';
    protected $primary_key = ['lesson_ID'];
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'lesson_ID','lesson_name','chapter_ID','revcenter_ID','lessondesc','parent_ID',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'lesson_ID','lesson_name','chapter_ID','revcenter_ID','lessondesc','parent_ID'
    // ];
}

