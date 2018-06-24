<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'id','esp_id','grandeza','name','valor','ativo',
    ];

    public function esp()
    {
    	return $this->belongsTo(\App\Esp::class, 'esp_id','id');
    }

    public function ativoToStr()
    {
        switch ($this->ativo) {
            case 0:
                return 'NAO';
            case 1:
                return 'SIM';
        }
        return 'Unknown';
    }

    


}
