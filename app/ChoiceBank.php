<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChoiceBank extends Model
{
    public $table='choicebank';
    public $timestamps=false;
    public $incrementing=false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'choice_ID','question_ID','choice'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'choice_ID','question_ID','choice'
    // ];

    public function question(){
        return $this->hasOne('App\QuestionBank','question_ID','question_ID');
    }
}
