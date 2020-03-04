<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mensajesEntidad; // Modelo Mensajes.

class mensajesController extends Controller
{
    //protected $id_enviar;

    public function index($id_enviar){
        //$id_enviar = $id;

        //$sms=mensajesEntidad::paginate(2);
        $sms=mensajesEntidad::all();


        return view('mensajes.sms', ['sms' => $sms, 'id_enviar' => $id_enviar]);
    }

    public function imprimirPDF(){
        $mensajes = mensajesEntidad::all();

        $pdf = \PDF::loadView('mensajes.pdf', ['mensajes' => $mensajes]);
        return $pdf->download('Mensajes.pdf');
    }

    public function save(Request $request){

        //Recogiendo los datos. 
        $sms = $request->input('mensaje');
        $id_enviar = $request->input('id_enviar');

        $fecha = new \DateTime; // Cogemos la fecha y tiempo de hoy.
        $fecha->format('d-m-Y H:i:s');

        $user = \Auth::user(); // Entramos en el usuario logueado.

        $mensaje = new mensajesEntidad();

        $mensaje->mensaje = $sms;
        $mensaje->id_profesor = $user->id;
        $mensaje->id_profesorEnviar = $id_enviar;
        $mensaje->created_at = $fecha;
        $mensaje->updated_at = $fecha;

/*         var_dump($mensaje);
        die(); */
        $resultado = $mensaje->save();
        
        if($resultado){
            (new logsController)->save("Se ha mandado un mensaje.");
        }

       return back()
                ->with(['message'=>'El usuario actualizado correctamente']);

    }

    public function delete($id){

        // Objeto Incidencia.
        $mensaje =  mensajesEntidad::find($id);

        //dd($mensaje);

        //Comprobar si soy el dueño del comentario de la ap

            $resultado = $mensaje->delete();

            if($resultado){
                (new logsController)->save("Ha borrado un mensaje.");
            }

            return redirect()->route('user.list')
            ->with(['message'=>'Has borrado la incidencia correctamente.']); 
        
    }

    /*public function delete(){

    }*/
}
