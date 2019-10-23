<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonModule extends Model
{ 
    public $table='lessonmodule';
    protected $primary_key = ['lessonmodule_ID'];
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'lessonmodule_ID','lesson_ID','resource_ID','modulequestions_ID','index'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'lessonmodule_ID','lesson_ID','resource_ID','modulequestions_ID','index'
    // ];

    public function lesson(){
        return $this->hasOne('App\Lessons','lesson_ID','lesson_ID');
    }

    public function resource(){
        return $this->hasOne('App\ResourceBank','resource_ID','resource_ID');
    }

    public function question(){
        return $this->hasOne('App\ModuleQuestion','modulequestion_ID','modulequestions_ID');
    }
}