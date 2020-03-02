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
        //$incidencia = incidenciaEntidad::orderBy('id', 'desc')->get();
        
        $incidencias= incidenciaEntidad::paginate(3);

        /*foreach ($incidencia as $value) {
            var_dump($value->id_profesor);
            var_dump($value->users);
        }*/

        //var_dump($incidencia->id_profesor);
        //var_dump($incidencia->user);
        //die();

        return view('incidencias.create', [
            'incidencias' => $incidencias,
        ]);
    }

    public function edit($id){
        $incidencias = incidenciaEntidad::find($id);
        
        return view('incidencias.update', [
            'incidencias' => $incidencias,
        ]);
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


/*         var_dump($incidencia);
        die(); */
        //var_dump($user->id);

        $incidencia->save();

       return redirect()->route('incidencias.create')
                            ->with(['message'=>'El usuario actualizado correctamente']);

        /* var_dump($aula);
        var_dump($descripcion);  */
    } 

    public function update(Request $request){ 
        // Validación
/*         $validate = $this->validate($request, [
            'descripcion' => 'required',
            'aula' => 'required|max:6',
        ]); */

        //Recogiendo los datos. 
        $id_incidencia = $request->input('id_incidencia');
        $aula = $request->input('aula');
        $descripcion = $request->input('descripcion');
        $importancia = $request->input('importancia');

        $fecha = new \DateTime;
        $fecha->format('d-m-Y H:i:s');

        $incidencia = incidenciaEntidad::find($id_incidencia);
        $incidencia->aula = $aula;
        $incidencia->descripcion = $descripcion;
        $incidencia->importancia = $importancia;
        $incidencia->updated_at = $fecha;
/*         var_dump($incidencia->aula);
        var_dump($aula);
        var_dump($descripcion);
        var_dump($incidencia);
        var_dump($id_incidencia);
        die(); */

        $incidencia->update();

        return redirect()-> route('incidencias.edit', ['id' => $id_incidencia])
                                ->with(['message'=>'La incidencia se ha actualizado correctamente']);
    }

    public function delete($id){

        // Conseguir datos del usuario logueado.
        $user = \Auth::user();

        // Objeto Incidencia.
        $incidencia = incidenciaEntidad::find($id);

        //Comprobar si soy el dueño del comentario de la ap
        if($user->rol == "admin"){
            $incidencia->delete();
            return redirect()->route('incidencias.create')
                            ->with(['message'=>'Has borrado la incidencia correctamente.']); 
        }else {
            return redirect()->route('incidencias.create')
                            ->with(['message'=>'No se ha borrado.']); 
        }
    }
}
