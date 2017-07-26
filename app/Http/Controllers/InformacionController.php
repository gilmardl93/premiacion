<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informacion;

class InformacionController extends Controller
{
    public function index()
    {
        $informacion = Informacion::all();
        return view('informacion.informacion', compact('informacion'));
    }

    public function actualizar(Request $request)
    {

        Informacion::where('id',$request->id)->update([
            'informacion'   => $request->informacion,
            'firma_1'       => $request->firma_1,
            'firma_2'       => $request->firma_2,
            'firma_3'       => $request->firma_3,
            'cargo_1'       => $request->cargo_1,
            'cargo_2'       => $request->cargo_2,
            'cargo_3'       => $request->cargo_3
            ]);

        return redirect('informacion')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>INFORMACION ACTUALIZADA !!</strong> Se actualizo la información.</div>'); 
    }
}
