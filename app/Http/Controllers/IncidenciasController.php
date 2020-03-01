<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\incidenciaEntidad; // Modelo Incidencia.

class IncidenciasController extends Controller
{
    public function __contructe(){ // Solo pueden los usuarios identificados.
        $this->middleware('auth');
    }

    public function create(){
        return view('incidencias.create');
    }
    
    public function save(Request $request){

        // Validación
        $validate = $this->validate($request, [
            'descripcion' => 'required',
            'aula' => 'required|max:6',
        ]);

        //Recogiendo los datos. 
        $aula = $request->input('aula');
        $descripcion = $request->input('descripcion');
        $importancia = $request->input('importancia');

        $user = \Auth::user(); // Entramos en el usuario logueado.

        $incidencia = new incidenciaEntidad();
        $incidencia->descripcion = $descripcion;
        $incidencia->aula = $aula;
        $incidencia->importancia = $importancia;
        $incidencia->id_profesor = $user->id;


        //var_dump($incidencia);
        //die();
        //var_dump($user->id);

        $incidencia->save();

        return redirect()->route('incidencias.create')
                            ->with(['message'=>'El usuario actualizado correctamente']);

        /* var_dump($aula);
        var_dump($descripcion);  */
    } 
}
