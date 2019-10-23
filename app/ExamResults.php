<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResults extends Model
{
    public $table='examresults';
    public $timestamps=false;
    public $incrementing=false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'exam_ID','lesson_ID','perfectscore','userscore','percentage'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'exam_ID','lesson_ID','perfectscore','userscore','percentage'
    // ];

    public function lesson(){
        return $this->hasOne('App\Lessons','lesson_ID','lesson_ID');
    }
}
