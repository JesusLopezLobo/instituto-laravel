<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\logsEntidad; // Modelo logs.
use Illuminate\Support\Facades\DB;

class logsController extends Controller
{
    public function list(){
        $logs=LogsEntidad::paginate(3);

        return view('logs.listLog', ['logs' => $logs]);
    }

    public function ordenarLogsId(){
        //$logs = DB::table('logs')->orderBy('id','asc')->paginate(5);
        //dd($logs);
        $logs = LogsEntidad::orderBy('id','desc')->paginate(5);
        return view('logs.listLog', ['logs' => $logs]);
    }

    public function ordenarLogsAccion(){
        //$logs = DB::table('logs')->orderBy('id','asc')->paginate(5);
        //dd($logs);
        $logs = LogsEntidad::orderBy('accion','desc')->paginate(5);
        return view('logs.listLog', ['logs' => $logs]);
    }

    public function imprimirPDF(){
        $logs = LogsEntidad::all();

        $pdf = \PDF::loadView('logs.pdf', ['logs' => $logs]);
        return $pdf->download('logs.pdf');
    }

    public function save($accion){

        $user = \Auth::user(); // Entramos en el usuario logueado.

        $logs = new logsEntidad();
        $logs->accion = $accion;
        $logs->id_profesor = $user->id;

        $logs->save();
                            
    }
}
