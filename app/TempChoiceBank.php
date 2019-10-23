<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempChoiceBank extends Model
{
    public $table='tempchoicebank';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tempchoice_ID','choiceorder','tempquestion_ID','choice'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'tempchoice_ID','choiceorder','tempquestion_ID','choice'
    ];
    
}
