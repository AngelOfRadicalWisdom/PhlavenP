<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLearningPath extends Model
{
    //
    public $table='userlearningpath';
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
public $fillable = [
        'user_ID','learningpath_ID','status','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'user_ID','learningpath_ID','status'
    // ];

    public function users(){
        return $this->hasOne('App\Users','user_ID','user_ID');
    }
    public function learningpath(){
        return $this->hasOne('App\LearningPath','learningpath_ID','learningpath_ID');
        return $this->hasMany(RevCenter::class);
    }
}
