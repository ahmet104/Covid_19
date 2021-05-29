<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
class File extends Model
{
    // protected $connection = 'mongodb';

    protected $guarded = [];
    protected $connection = 'mongodb';
    // protected $fillable=['title','path'];
}
