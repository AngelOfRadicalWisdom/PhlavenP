<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningPathNodes extends Model
{
    public $table='learningpathnodes';
    public $timestamps=false;
    public $incrementing=false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'learningpathnode_ID','learningpath_ID','chapter_ID','parent_ID',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'learningpathnode_ID','learningpath_ID','chapter_ID','parent_ID',
    // ];

    public function chapters(){
        return $this->hasOne('App\Nodes','chapter_ID','chapter_ID');
    }
}
