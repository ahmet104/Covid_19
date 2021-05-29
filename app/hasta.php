<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Hasta extends Eloquent
{
    protected $connection = 'mongodb';
    protected $guarded = [];
}
