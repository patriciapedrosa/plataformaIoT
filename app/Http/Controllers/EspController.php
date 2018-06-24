<?php

namespace App\Http\Controllers;

use App\Esp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\EspResource;


class EspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $esps = Esp::orderBy('id')->paginate(10);


            return view('esp.list',compact('esps'));

        
    }



}
