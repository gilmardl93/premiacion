<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table = "postulante";

    public function scopeValidarDNI($cadenaSQL, $dni)
    {
        return $cadenaSQL->where('numero_identificacion',$dni);
    }

    public function scopeObtenerID($cadenaSQL, $dni)
    {
        return $cadenaSQL->where('numero_identificacion',$dni);
    }
}
