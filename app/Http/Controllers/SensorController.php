<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Esp;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Esp $esp)
    {
        $total = Sensor::where('esp_id', $esp->id)->orderBy('id')->count();
        $sensors = Sensor::where('esp_id', $esp->id)->orderBy('id')->paginate(10);
        $tipo = Sensor::where('esp_id', $esp->id)->select('name')->distinct()->get();
        return view('sensor.list',compact('sensors', 'tipo','total'));
    }

    public function add(Request $request)
    {

        $sensor = Sensor::create([
        'grandeza' => $request->grandeza,
        'esp_id' => $request->esp_id,
        'valor' => $request->valor,
        'name' => $request->name,
        'ssid' => $request->ssid,


      ]);

        $sensor->save();

    }

}
