<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __contructe(){
        $this->middleware('auth');
    }

    public function config(){
        return view('user.config');
    }

    public function update(Request $request){ 
        $user = \Auth::user();
        $id = $user->id;

        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id], // Con esto último decimos que sea unico (diferente al resto), menos al que esta logueado.
            'aula' => ['required', 'string', 'max:10'] 
        ]);


        $nombre = $request->input('name');
        $email = $request->input('email');
        $aula = $request->input('aula');
        
/*         var_dump($nombre);
        var_dump($id);

        die(); */

        // Ejecutar consulta a la base de datos de update.
        $user->name = $nombre ;
        $user->email = $email;
        $user->aula = $aula;
        $image_path = $request->file('image_path');

        // Asignamos la imagen
        if($image_path){
            $image_path_name=time().$image_path->getClientOriginalName();

            Storage::disk("users")->put($image_path_name,File::get($image_path));
            $user->imagen=$image_path_name;
        }

        $user->update();

        return redirect()-> route('config')
                                ->with(['message'=>'El usuario actualizado correctamente']);

    }

    public function getImage($filename){
        $file=Storage::disk("users")->get($filename);
        return new Response($file,200);
    }


}
