<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = "Premiacion.asistencia";

    public function scopeValidarID($cadenaSQL, $id)
    {
        return $cadenaSQL->where('idingresante',$id);
    }

    public function scopeAsistieron($cadenaSQL)
    {
        return $cadenaSQL->where('asistio',true);
    }

    public function scopeNoFueSorteado($cadenaSQL)
    {
        return $cadenaSQL->where('sorteo', false)
                        ->where('asistio',true);
    }

    public function ingresante()
    {
        return $this->hasOne(Ingresante::class,'id','idingresante');
    }
}
