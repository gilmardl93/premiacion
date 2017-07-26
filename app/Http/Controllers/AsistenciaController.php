<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulante;
use App\Models\Asistencia;
use App\Models\Ingresante;

class AsistenciaController extends Controller
{
    public function index()
    {
        return view('asistencia.index');
    }

    public function asistencia(Request $request)
    {
        $validar = Postulante::ValidarDNI($request->dni)->count();
        if($validar == 1)
        {
            $ObtenerID = Postulante::ObtenerID($request->dni)->select('id')->get();
            foreach($ObtenerID as $row):
                $ValidarIngreso = Ingresante::ValidarID($row->id)->count();
                $ObtenerIDIngresante = Ingresante::ValidarID($row->id)->select('id')->get();
                if ($ValidarIngreso == 1)
                {
                    foreach($ObtenerIDIngresante as $row2):
                        $ValidarID = Asistencia::ValidarID($row2->id)->count();
                        if($ValidarID == 0)
                        {
                            $data = new Asistencia();
                            $data->idingresante = $row2->id;
                            $data->asistio = true;
                            $data->save();
                            return redirect('asistencia')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>ASISTENCIA REGISTRADA !!</strong> Se registro la asistencia del Ingresante.</div>'); 

                        }else if($ValidarID == 1)
                        {
                            $ActualizarAsistencia = Asistencia::ValidarID($row2->id)->update(['asistio' => true]);
                            return redirect('asistencia')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>ASISTENCIA REGISTRADA !!</strong> Se registro la asistencia del Ingresante.</div>'); 
                        }
                    endforeach;
                }else if($ValidarIngreso == 0)
                {
                    return redirect('asistencia')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>DNI INVALIDO !!</strong> Este DNI no corresponde a ningun Ingresante.</div>'); 
                }
            endforeach;
        }else if($validar == 0)
        {
            return redirect('asistencia')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>DNI INVALIDO !!</strong> Este DNI no existe en nuestra Base de Datos.</div>'); 
        }
    }
}
