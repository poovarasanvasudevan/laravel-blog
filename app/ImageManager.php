<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageManager extends Model
{
    //

    protected $table="imagemanager";
    protected $fillable = [
        'name',
        'url',
        'imageid'
    ];
}
