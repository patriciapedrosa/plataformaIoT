<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Esp extends Model
{
    protected $fillable = [
        'id','status','mac',
    ];

    public function sensor()
    {
    	return $this->hasMany(\App\Sensor::class, 'sensor_id');
    }

    public function statusToStr()
    {
        switch ($this->status) {
            case '0':
                return 'Desligado';
                break;
            case '1':
                return 'Ligado';
                break;
            
            default:
                # code...
                break;
        }
    }

}
