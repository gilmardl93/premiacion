<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facultad;
use App\Models\Especialidad;
use App\Models\Ingresante;
use App\Models\Asistencia;

class SorteoController extends Controller
{
    public function index()
    {
        return view('sorteo.index');
    }

    public function facultad()
    {
        $facultades = Facultad::pluck('nombre','id');
        $ingresantes = Ingresante::all();
        return view('sorteo.facultad', compact(['facultades','ingresantes']));
    }

    public function especialidad()
    {
        $especialidades = Especialidad::pluck('nombre','id');
        return view('sorteo.especialidad', compact('especialidades'));
    }

    public function general()
    {
        return view('sorteo.general');
    }

    public function sorteofacultad(Request $request)
    {
        $facultades = Facultad::pluck('nombre','id');
        $ingresantes = Asistencia::NoFueSorteado()
                                ->select('p.paterno','p.materno','p.nombres','p.codigo','i.id','e.nombre as especialidad','p.foto_editada')
                                ->join('ingresante as i', 'i.id', '=', 'asistencia.idingresante')
                                ->join('postulante as p', 'p.id', '=', 'i.idpostulante')
                                ->join('especialidad as e','e.id', '=', 'i.idespecialidad')
                                ->where('i.idfacultad', $request->facultades)
                                ->inRandomOrder()
                                ->take(1)
                                ->get();

        if($ingresantes->count() == 0)
        {
            return redirect('sorteo-facultad')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>TODOS LOS INGRESANTES DE ESTA FACULTAD YA FUERON SORTEADOS !!</strong> Debe seleccionar otra Facultad.</div>'); 
            
        }else 
        {
            foreach($ingresantes as $row):
                Asistencia::where('idingresante', $row->id)->update(['sorteo' => true]);
            endforeach;
            return view('sorteo.resultado_facultad', compact(['facultades','ingresantes']));
        }
    }

    public function sorteoespecialidad(Request $request)
    {
        $especialidades = Especialidad::pluck('nombre','id');
        $ingresantes = Asistencia::NoFueSorteado()
                                ->select('p.paterno','p.materno','p.nombres','p.codigo','i.id','e.nombre as especialidad','p.foto_editada')
                                ->join('ingresante as i', 'i.id', '=', 'asistencia.idingresante')
                                ->join('postulante as p', 'p.id', '=', 'i.idpostulante')
                                ->join('especialidad as e','e.id', '=', 'i.idespecialidad')
                                ->where('i.idespecialidad', $request->especialidades)
                                ->inRandomOrder()
                                ->take(1)
                                ->get();

        if($ingresantes->count() == 0)
        {
            return redirect('sorteo-especialidad')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>TODOS LOS INGRESANTES DE ESTA ESPECIALIDAD YA FUERON SORTEADOS !!</strong> Debe seleccionar otra Especialidad.</div>'); 
            
        }else 
        {
            foreach($ingresantes as $row):
                Asistencia::where('idingresante', $row->id)->update(['sorteo' => true]);
            endforeach;
            return view('sorteo.resultado_especialidad', compact(['especialidades','ingresantes']));
        }
    }

    public function sorteogeneral()
    {
        $facultades = Facultad::pluck('nombre','id');
        $ingresantes = Asistencia::NoFueSorteado()
                                ->select('p.paterno','p.materno','p.nombres','p.codigo','i.id','e.nombre as especialidad','p.foto_editada')
                                ->join('ingresante as i', 'i.id', '=', 'asistencia.idingresante')
                                ->join('postulante as p', 'p.id', '=', 'i.idpostulante')
                                ->join('especialidad as e','e.id', '=', 'i.idespecialidad')
                                ->inRandomOrder()
                                ->take(1)
                                ->get();

        if($ingresantes->count() == 0)
        {
            return redirect('sorteo-general')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>TODOS LOS INGRESANTES YA FUERON SORTEADOS !!</strong> .</div>'); 
            
        }else 
        {
            foreach($ingresantes as $row):
                Asistencia::where('idingresante', $row->id)->update(['sorteo' => true]);
            endforeach;
            return view('sorteo.resultado_general', compact('ingresantes'));
        }
    }
}
