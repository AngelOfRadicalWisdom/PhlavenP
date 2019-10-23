<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    public $table='questionbank';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'question_ID','type','lesson_ID','question','correctanswer','difficulty'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'question_ID','type','lesson_ID','question','correctanswer','difficulty'
    // ];

    public function answer(){
        return $this->hasOne('App\ModuleChoices','modulechoice_ID','correctanswer');
    }

    public function choices(){
        return $this->hasMany('App\ModuleChoices','modulequestion_ID','question_ID');
    }

    public function questionchoices(){
        return $this->hasMany('App\ChoiceBank','question_ID','question_ID');
    }

    public function questionsubquestions(){
        return $this->hasMany('App\SubquestionBank','question_ID','question_ID');
    }

    public function questionanswer(){
        return $this->hasOne('App\ChoiceBank','choice_ID','correctanswer');
    }
    
}
