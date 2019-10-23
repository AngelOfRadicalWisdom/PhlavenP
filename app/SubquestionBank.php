<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubquestionBank extends Model
{
    public $table='subquestionbank';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'subquestion_ID','question_ID','question','correctanswer','difficulty'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $hidden = [
        'subquestion_ID','question_ID','question','correctanswer','difficulty'
    ];

    public function questionchoices(){
        return $this->hasMany('App\ChoiceBank','question_ID','subquestion_ID');
    }

    public function subquestionanswergroups(){
        return $this->hasMany('App\AnswergroupBank','subquestion_ID','subquestion_ID');
    }
}
