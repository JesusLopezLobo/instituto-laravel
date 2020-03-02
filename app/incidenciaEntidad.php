<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class incidenciaEntidad extends Model
{
    protected $table = 'incidencias';

    // Incidencia --- N:1 --- Profesor
    public function user(){
        return $this->belongsTo('App\User', 'id_profesor');
    } 
}
