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
            $total = Esp::orderBy('id')->count();
            $status = Esp::where('status','1')->count();

            return view('esp.list',compact('esps', 'status','total'));

        
    }

    public function status(int $id)
    {   
        return new EspResource(Esp::find($id));
    }

    public function turnOn($id)
    {
        Esp::where('id',$id)->update([
            'status'=>1
        ]);

        //enviar para os rasp
        return redirect()
        ->route('esp.list')
        ->with('success', 'Esp ligado com sucesso');
    }

    public function turnOff($id)
    {
        Esp::where('id',$id)->update([
            'status'=>0
        ]);
        //enviar para o rasp;
        return redirect()
        ->route('esp.list')
        ->with('success', 'Esp Desligado com sucesso');
    }

    public function add(Request $request)
    {
        $mac_adress = $request->input('mac');
        $mac_count = Esp::where('mac', '=', $mac_adress)->count();
        if ($mac_count == 0) {
            $mac = Esp::create(['mac' => $mac_adress, 'status' => 1]);
        }
        return response()->json(['message' => 'sucesso'], 200);
    }

}
