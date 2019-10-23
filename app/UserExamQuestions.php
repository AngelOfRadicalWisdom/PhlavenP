<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExamQuestions extends Model
{
    public $table='userexamquestions';
    public $timestamps=false;
    public $incrementing=false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'exam_ID','question_ID','correct','score'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'exam_ID','question_ID','correct','score'
    // ];

    public function questions(){
        return $this->hasOne('App\QuestionBank','question_ID','question_ID');
    }
}
