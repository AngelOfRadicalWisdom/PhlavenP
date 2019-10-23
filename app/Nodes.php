<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nodes extends Model
{
    public $table='chapters';
    protected $primaryKey=['chapter_ID'];
    public $timestamps=false;
    public $incrementing=false;
    
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'chapter_ID','chapter_name','revcenter_ID','description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'learningpath_ID','node_ID','revcenter_ID','description'
    // ];
}
