<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempAnswergroupBank extends Model
{
    public $table='tempanswergroupbank';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tempanswergroup_ID','tempsubquestion_ID','question','correctanswer','difficulty'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'tempanswergroup_ID','tempsubquestion_ID','question','correctanswer','difficulty'
    ];

    public function questionchoices(){
        return $this->hasMany('App\TempChoiceBank','tempquestion_ID','tempanswergroup_ID');
    }
    
}
