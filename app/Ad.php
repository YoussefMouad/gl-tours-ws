<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Ad extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "ads";
    protected $fillable = [
        'title',
        'description',
        'picture',
        'date',
		'place_id',
    ];

    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
