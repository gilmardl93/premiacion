<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Puesto;
use App\Models\Informacion;
use PDF;

class ReportesController extends Controller
{    
    public function TituloColumnas()
    {
        PDF::SetFont('Helvetica','B',12);
        PDF::SetXY(50,30);
        PDF::Cell(70,10,'INGRESANTES QUE ASISTIERON A LA CEREMONIA');
        PDF::SetFont('Helvetica','B',10);
        PDF::SetXY(25,45);
        PDF::Cell(10,10,'N°',1);
        PDF::SetXY(35,45);
        PDF::Cell(95,10,'INGRESANTE',1);
        PDF::SetXY(130,45);
        PDF::Cell(20,10,'DNI',1);
        PDF::SetXY(150,45);
        PDF::Cell(30,10,'ASISTIO',1);
        
    }

    public function PDFAsistencia()
    {
        $asistencias = Asistencia::select('p.paterno','p.materno','p.nombres','p.numero_identificacion','asistencia.asistio')
                        ->join('ingresante as i','i.id','=','asistencia.idingresante')
                        ->join('postulante as p','p.id','=','i.idpostulante')       
                        ->where('asistencia.asistio',true)                 
                        ->get();
        PDF::SetTitle('INGRESANTES QUE ASISTIERÓN A LA CEREMONIA');
        PDF::SetAutoPageBreak(false);
        PDF::AddPage('R','A4');
        HeaderPDF();
        FooterPDF();
        
        $altodecelda=5;
        $incremento = 55;
        $numMaxLineas = 40;
        $x = 15;
        $y = 0;
        $i = 0;
        $this->TituloColumnas();
        foreach($asistencias as $row):
            if($i%$numMaxLineas==0 && $i!=0){
                PDF::AddPage('R', 'A4');
                HeaderPDF();
                FooterPDF();
                $this->TituloColumnas();
                $y = 0;
            }
            
            #
            PDF::SetXY($x+10, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(10, $altodecelda, $i+1, 1);
            #
            PDF::SetXY($x+20, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(95,$altodecelda,$row->paterno.' '.$row->materno.' '.$row->nombres,1);
            #
            PDF::SetXY($x+115, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(20,$altodecelda,$row->numero_identificacion,1);
            #
            PDF::SetXY($x+135, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(30,$altodecelda,'Si',1);

            $y++;
            $i++;
        endforeach;
    
        PDF::Output('TOTAL_DE_ASISTENCIAS.pdf');
    }

    public function PDFdiploma()
    {
        $PrimerosPuestos = Puesto::select('p.paterno','p.materno','p.nombres','p.codigo','p.numero_identificacion','e.nombre as especialidad','f.nombre as facultad','m.nombre as modalidad','primeros_puesto.puesto')
                                ->join('ingresante as i','i.id','=','primeros_puesto.idingresante')
                                ->join('postulante as p','p.id','=','i.idpostulante')
                                ->join('especialidad as e','e.id','=','i.idespecialidad')
                                ->join('modalidad as m','m.id','=','i.idmodalidad')
                                ->join('facultad as f','f.id','=','i.idfacultad')
                                ->get();   

        $Informacion = Informacion::all();

        foreach($Informacion as $row2):
        endforeach;
        foreach($PrimerosPuestos as $row):
        PDF::SetAutoPageBreak(false);
        PDF::AddPage('L','A4');
        $img_file = 'diploma.png';
        PDF::Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
        PDF::SetFont('helvetica', '', 14);
        PDF::SetXY(20,90);
        PDF::writeHTML($row2->informacion, true, false, true, false, '');
        PDF::SetFont('helvetica', '', 25);
        PDF::SetXY(110,125);
        PDF::Cell(120,10,$row->puesto,0);
        PDF::SetXY(60,140);
        PDF::SetFont('helvetica', '', 25);
        PDF::Cell(120,10,$row->paterno.' '.$row->materno.' '.$row->nombres,0);
        PDF::SetFont('helvetica', '', 14);
        PDF::SetXY(10,180);
        PDF::SetFont('helvetica', '', 10);
        if($row2->firma_1 != "VACIO"){
        PDF::Cell(60,10,'__________________________________');
        PDF::SetXY(5,190);
        PDF::MultiCell(80,10,$row2->firma_1,0,'C');
        PDF::SetXY(5,195);
        PDF::MultiCell(80,10,$row2->cargo_1,0,'C');
        }
        if($row2->firma_2 != "VACIO"){
        PDF::SetXY(110,180);
        PDF::Cell(60,10,'__________________________________');
        PDF::SetXY(105,190);
        PDF::MultiCell(80,10,$row2->firma_2,0,'C');
        PDF::SetXY(105,195);
        PDF::MultiCell(80,10,$row2->cargo_2,0,'C');
        }
        if($row2->firma_3 != "VACIO"){
        PDF::SetXY(210,180);
        PDF::Cell(60,10,'__________________________________');
        PDF::SetXY(205,190);
        PDF::MultiCell(80,10,$row2->firma_3,0,'C');
        PDF::SetXY(205,195);
        PDF::MultiCell(80,10,$row2->cargo_3,0,'C');
        }
        endforeach;
        PDF::OutPut('PDF_DIPLOMAS.pdf');
    }
}
