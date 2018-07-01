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
		$mac_adress = $request->input('thingId');
		$mac_count = Esp::where('thingId', '=', $mac_adress)->count();
		if ($mac_count == 0) {


			$esp = Esp::create([
				'ssid' => $request->ssid,
				'thingId' => $request->thingId,
			]);

			$esp->save();
		}


		$esp =Esp::where('ssid', $request->ssid)->value('id');

        $sensor=Sensor::where('esp_id', $esp);


        $sensor->delete();

		
		$sensor1 = Sensor::create([
			'grandeza' => $request->US0,
			'name' => $request->NS0,
			'esp_id' => $esp,
			'valor' => $request->VS0,
			'ativo' => $request->ES0,
		]);
		$sensor2 = Sensor::create([
			'grandeza' => $request->US1,
			'name' => $request->NS1,
			'esp_id' => $esp,
			'valor' => $request->VS1,
			'ativo' => $request->ES1,
		]);
		$sensor3 = Sensor::create([
			'grandeza' => $request->US2,
			'name' => $request->NS2,
			'esp_id' => $esp,
			'valor' => $request->VS2,
			'ativo' => $request->ES2,
		]);
		$sensor1->save();
		$sensor2->save();
		$sensor3->save();
		return response()->json(['message' => 'sucesso'], 200);

	}
}