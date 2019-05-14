<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Place extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "places";

    public function ads()
    {
        return $this->hasMany('App\Ad');
    }

}
