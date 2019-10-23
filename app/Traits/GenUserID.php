<?php

namespace App;

use Webpatser\Uuid\Uuid;

trait GenUserID
{
    /**
     * Boot function from laravel.
     */

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->user_ID} = Uuid::generate()->string;
        });
    }
}




?>