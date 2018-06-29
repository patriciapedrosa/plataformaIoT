<?php

namespace App\Http\Controllers;

use App\Esp;
use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SensorEspControllerAPI extends Controller
{
	public function add(Request $request)
	{
		$mac_adress = $request->input('thingNome');
		$mac_count = Esp::where('thingNome', '=', $mac_adress)->count();
		if ($mac_count == 0) {


			$esp = Esp::create([
				'thingId' => $request->thingId,
				'thingNome' => $request->thingNome,
			]);

			$esp->save();
		}


		$esp =Esp::where('thingId', $request->thingId)->value('id');

        $sensor=Sensor::where('esp_id', $esp);


        $sensor->delete();

		
		$sensor1 = Sensor::create([
			'grandeza' => $request->UA0,
			'name' => $request->NA0,
			'esp_id' => $esp,
			'valor' => $request->VA0,
			'ativo' => $request->EA0,
		]);
		$sensor2 = Sensor::create([
			'grandeza' => $request->UD1,
			'name' => $request->ND1,
			'esp_id' => $esp,
			'valor' => $request->VD1,
			'ativo' => $request->ED1,
		]);
		$sensor3 = Sensor::create([
			'grandeza' => $request->UD2,
			'name' => $request->ND2,
			'esp_id' => $esp,
			'valor' => $request->VD2,
			'ativo' => $request->ED2,
		]);
		$sensor1->save();
		$sensor2->save();
		$sensor3->save();

	}
}