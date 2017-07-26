<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingresante;
use App\Models\Postulante;
use App\Models\Asistencia;
use App\Models\Puesto;
use App\Http\Requests\PuestosRequest;

class PuestosController extends Controller
{
    public function index()
    {
        $primeros = Puesto::select('p.paterno','p.materno','p.nombres','p.numero_identificacion','p.codigo','primeros_puesto.puesto')
                            ->join('ingresante as i','i.id','=','primeros_puesto.idingresante')
                            ->join('postulante as p','p.id','=','i.idpostulante')
                            ->paginate(10);
        return view('ingresantes.index', compact('primeros'));
    }

    public function registrar(PuestosRequest $request)
    {
        $ValidarDNI = Postulante::ValidarDNI($request->dni)->count();
        if($ValidarDNI == 1)
        {
            $ObtenerID = Postulante::ValidarDNI($request->dni)->select('id')->get();
            foreach($ObtenerID as $row):
                $ValidarIngresante = Ingresante::ValidarID($row->id)->count();
                $ObtenerIDIngresante = Ingresante::ValidarID($row->id)->get();
                if($ValidarIngresante == 1)
                {
                    foreach($ObtenerIDIngresante as $row2):
                    $ValidarPuesto = Puesto::ValidarID($row2->id)->count();
                    $ValidarAsistencia = Asistencia::ValidarID($row2->id)->count();
                    if($ValidarAsistencia == 1 && $ValidarPuesto == 1)
                    {
                        return redirect('primeros-puestos')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>ESTE DNI YA SE ENCUENTRA REGISTRADO !!</strong> </div>'); 

                    }else if($ValidarAsistencia == 1 && $ValidarPuesto == 0)
                    {
                        $data = new Puesto();
                        $data->idingresante = $row2->id;
                        $data->puesto       = $request->puesto;
                        $data->save();

                        Asistencia::ValidarID($row2->id)->update(['sorteo' => true]);

                        return redirect('primeros-puestos')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>SE REGISTRO LOS DATOS INGRESADOS !!</strong> </div>'); 
                    }else if($ValidarAsistencia == 0 && $ValidarPuesto == 0)
                    {
                        $data = new Puesto();
                        $data->idingresante = $row2->id;
                        $data->puesto       = $request->puesto;
                        $data->save();

                        $data = new Asistencia();
                        $data->idingresante = $row2->id;
                        $data->save();

                        Asistencia::ValidarID($row2->id)->update(['sorteo' => true]);

                        return redirect('primeros-puestos')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>SE REGISTRO LOS DATOS INGRESADOS !!</strong> </div>'); 

                    }
                    endforeach;
                }else if($ValidarIngresante == 0)
                {
                    return redirect('primeros-puestos')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>DNI INVALIDO !!</strong> Este DNI no corresponde a ningún ingresante.</div>'); 
                }
            endforeach;
        }else if($ValidarDNI == 0) 
        {  
            return redirect('primeros-puestos')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>DNI INVALIDO !!</strong> Este DNI no corresponde a ningún postulante.</div>'); 
        }
    }
}
