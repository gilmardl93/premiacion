<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingresante extends Model
{
    protected $table = "ingresante";

    public function scopeValidarID($cadenaSQL, $id)
    {
        return $cadenaSQL->where('idpostulante',$id);
    }

    public function scopeFacultad($cadenaSQL, $facultad)
    {
        return $cadenaSQL->where('idfacultad', $facultad);
    }

    public function scopePrimerosPuestos($cadenaSQL)
    {
        return $cadenaSQL->whereNull('titulo');
    }

    public function postulante()
    {
        return $this->hasOne(Postulante::class,'id','idpostulante');
    }
}
