<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = "Premiacion.primeros_puesto";

    public function scopeValidarID($cadenaSQL, $id)
    {
        return $cadenaSQL->where('idingresante', $id);
    }
}
