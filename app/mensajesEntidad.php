<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mensajesEntidad extends Model
{
    protected $table = 'mensajes';

    // Incidencia --- N:1 --- Profesor
    public function user(){
        return $this->belongsTo('App\User', 'id_profesor');
    } 
}
