<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    
    protected $table  = 'Semibecas.solicitantes';

    public function scopeValidar($cadenaSQL, $id)
    {
        return $cadenaSQL->where('idpostulante', $id);
    }

    public function postulante()
    {
        return $this->hasOne(Postulante::class,'id','idpostulante');
    }
    
    public function recaudacion()
    {
        return $this->hasOne(Recaudacion::class,'idpostulante','idpostulante');
    }
    
    public function setOtorgaAttribute($value)
    {   
        if($value == 'BECA INTEGRAL')
            $this->attributes["tipo_descuento"] = 'Total';
        else if($value == 'SEMIBECA')
            $this->attributes["tipo_descuento"] = 'Parcial';
        else 
            $this->attributes["tipo_descuento"] = '';
    }

    public function scopeSemibeca($cadenaSQL)
    {
        return $cadenaSQL->where("otorga","SEMIBECA");
    }

    public function scopeIntegral($cadenaSQL)
    {
        return $cadenaSQL->where("otorga","BECA INTEGRAL");
    }

    public function scopeDenegado($cadenaSQL)
    {
        return $cadenaSQL->where("otorga","DENEGADO");
    }

    public function scopeInconcluso($cadenaSQL)
    {
        return $cadenaSQL->where('iduser','')
                        ->where('observaciones','')
                        ->where('promedio','')
                        ->where('otorga','');
    }

    public function colegio()
    {
        return $this->hasOne(Colegio::class, 'id', 'idcolegio');
    }

    public function documento()
    {
        return $this->hasMany(Document::class,'dni','numero_identificacion');
    }

    public function familiar()
    {
        return $this->hasMany(Familiar::class,'idpostulante','id');
    }

    public function encuesta()
    {
        return $this->hasMany(Encuesta::class,'idpostulante','id');
    }

    public function sexo()
    {
        return $this->hasOne(Catalogo::class,'id','idsexo');
    }
}
