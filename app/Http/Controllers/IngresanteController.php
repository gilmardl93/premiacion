<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingresante;
use App\Models\Asistencia;

class IngresanteController extends Controller
{
    public function index()
    {
        return view('ingresantes.index');
    }

    public function data()
    {
        $ingresantes = Ingresante::all();
        $res['data'] = $ingresantes;
        return $res;
    }

    public function importar()
    {
        $TotalIngresantes = Ingresante::count();
        return view('importar.index',compact('TotalIngresantes'));
    }

    public function importaringresantes()
    {
        $ingresantes = Ingresante::select('id')->get();
        foreach($ingresantes as $row):
            $validar = Asistencia::ValidarID($row->id)->count();
            if($validar == 0)
                $importar = Asistencia::insert(['idingresante' => $row->id]);
                return redirect('importar')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>SE IMPORTO TODOS LOS INGRESANTES !!</strong> Se importo todos los ingresantes.</div>'); 
        endforeach;
    }
}
