<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempSubquestionBank extends Model
{
    public $table='tempsubquestionbank';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tempsubquestion_ID','tempquestion_ID','question','correctanswer','difficulty'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'tempsubquestion_ID','tempquestion_ID','question','correctanswer','difficulty'
    ];

    public function questionchoices(){
        return $this->hasMany('App\TempChoiceBank','tempquestion_ID','tempsubquestion_ID');
    }

    public function subquestionanswergroup(){
        return $this->hasMany('App\TempAnswerGroupBank','tempsubquestion_ID','tempsubquestion_ID');
    }
}
