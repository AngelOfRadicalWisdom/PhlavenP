<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswergroupBank extends Model
{
    public $table='answergroupbank';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'answergroupID','subquestion_ID','question','correctanswer','difficulty'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'answergroupID','subquestion_ID','question','correctanswer','difficulty'
    ];

    public function questionchoices(){
        return $this->hasMany('App\TempChoiceBank','question_ID','answergroupID');
    }
}
