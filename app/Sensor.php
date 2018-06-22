<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'id','esp_id','grandeza','name','valor','ssid',
    ];

    public function esp()
    {
    	return $this->belongsTo(\App\Esp::class, 'esp_id','id');
    }


}
