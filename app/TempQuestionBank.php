<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempQuestionBank extends Model
{
    public $table='tempquestionbank';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'tempquestion_ID','order','type','lesson_ID','question','correctanswer','difficulty'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    // protected $hidden = [
    //     'tempquestion_ID','order','type','lesson_ID','question','correctanswer','difficulty'
    // ];

    public function questionchoices(){
        return $this->hasMany('App\TempChoiceBank','tempquestion_ID','tempquestion_ID');
    }

    public function questionsubquestions(){
        return $this->hasMany('App\TempSubquestionBank','tempquestion_ID','tempquestion_ID');
    }
    
}
