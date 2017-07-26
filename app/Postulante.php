<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Postulante extends Model
{

    protected $table = "postulante";

    public function getEdadAttribute()
    {
        if(isset($this->fecha_nacimiento))$edad = Carbon::createFromFormat('Y-m-d',$this->fecha_nacimiento)->age;
        else $edad = 0;

        return $edad;

    }

    public function getNombreCompletoAttribute()
    {
        return $this->paterno.' '.$this->materno.' '.$this->nombres;
    }

    public function scopeValidarDNI($cadenaSQL, $dni)
    {
        return $cadenaSQL->where('numero_identificacion',$dni);
    }

    public function recaudacion()
    {       
        return $this->hasMany(Recaudacion::class,'id','idpostulante');
    }

    public function proceso()
    {
        return $this->hasOne(Proceso::class,'id','idpostulante');
    }

    public function modalidad()
    {
        return $this->hasOne(Modalidad::class, 'id', 'idmodalidad');
    }

    public function especialidad()
    {
        return $this->hasOne(Especialidad::class, 'id', 'idespecialidad');
    }

    public function colegio()
    {
        return $this->hasOne(Colegio::class, 'id', 'idcolegio');
    }

    public function familiar()
    {
        return $this->hasMany(Familiar::class,'idpostulante','id');
    }

    public function sexo()
    {
        return $this->hasOne(Catalogo::class,'id','idsexo');
    }

    public function solicitante()
    {
        return $this->hasOne(Solicitante::class,'idpostulante','id');
    }
}
