<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesorEntidad extends Model
{
    
    protected $table = 'profesores'; // Tabla a modificar.

    // Profesor --- 1:N --- Incidencias.
    public function incidencias(){
        return $this->hasMany('App\incidenciaEntidad');
    }

    // Profesor --- 1:N --- Logs.
    public function logs(){
        return $this->hasMany('App\logsEntidad');
    }

}
