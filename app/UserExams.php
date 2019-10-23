<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserExams extends Model
{
    public $table='userexams';
    protected $primaryKey='exam_ID';
    public $timestamps=false;
    public $incrementing=false;
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'exam_ID','user_ID','examtype','score','status','datecreated','tableofspecs_ID','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'exam_ID','user_ID','examtype','score','status','datecreated','tableofspecs_ID'
    // ];

    public function userexamquestions(){
        return $this->hasMany(UserExamQuestions::class);
    }
}
