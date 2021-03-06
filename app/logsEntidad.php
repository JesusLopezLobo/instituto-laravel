<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logsEntidad extends Model
{
    protected $table = 'logs';

    // Incidencia --- N:1 --- Profesor
    public function user(){
        return $this->belongsTo('App\User', 'id_profesor');
    } 
}
