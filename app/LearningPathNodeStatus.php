<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningPathNodeStatus extends Model
{
    public $table='learningpathnodestatus';
    protected $primaryKey=['learningpathnodestatus_ID'];
    public $timestamps=false;
    public $incrementing=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'learningpathnodestatus_ID','reviewee_ID','learningpath_ID','chapter_ID','status','total','progress','reviewee_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'learningpathnodestatus_ID','reviewee_ID','learningpath_ID','status','total','progress',
    // ];

    public function chapters(){
        return $this->hasOne('App\Nodes','chapter_ID','chapter_ID');
    }
    
}
