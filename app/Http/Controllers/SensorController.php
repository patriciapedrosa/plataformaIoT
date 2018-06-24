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
        
        $sensors = Sensor::where('esp_id', $esp->id)->orderBy('id')->paginate(10);
        
        return view('sensor.list',compact('sensors'));
    }



}
