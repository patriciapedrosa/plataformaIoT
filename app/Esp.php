<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Esp extends Model
{
    protected $fillable = [
        'id','thingId','thingNome',
    ];

    public function sensor()
    {
    	return $this->hasMany(\App\Sensor::class, 'sensor_id');
    }


}
