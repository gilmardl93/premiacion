<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitante;
use App\Postulante;
use PDF;
use DB;

class BecaController extends Controller
{
    
    
    public function TituloColumnas()
    {
        PDF::SetFont('Helvetica','B',12);
        PDF::SetXY(60,45);
        PDF::Cell(70,10,'SOLICITANTES QUE OBTUVIERON SEMIBECA');
        PDF::SetFont('Helvetica','B',10);
        PDF::SetXY(25,65);
        PDF::Cell(10,10,'N°',1);
        PDF::SetXY(35,65);
        PDF::Cell(95,10,'SOLICITANTE',1);
        PDF::SetXY(130,65);
        PDF::Cell(20,10,'DNI',1);
        PDF::SetXY(150,65);
        PDF::Cell(30,10,'OTORGA',1);
        
    }

    public function PDFSemibeca()
    {
        $solicitantes = Solicitante::Semibeca()->with(['postulante'])->join('postulante as p','p.id','=','Semibecas.solicitantes.idpostulante')->orderBy('paterno')->get();
        PDF::SetTitle('SOLICITANTES QUE OBTUVIERON SEMIBECA');
        PDF::SetAutoPageBreak(false);
        PDF::AddPage('R','A4');
        HeaderPDF();
        FooterPDF();
        
        $altodecelda=5;
        $incremento = 75;
        $numMaxLineas = 40;
        $x = 15;
        $y = 0;
        $i = 0;
        $this->TituloColumnas();
        foreach($solicitantes as $row):
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
            PDF::Cell(95,$altodecelda,$row->postulante->nombre_completo,1);
            #
            PDF::SetXY($x+115, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(20,$altodecelda,$row->postulante->numero_identificacion,1);
            #
            PDF::SetXY($x+135, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(30,$altodecelda,$row->otorga,1);

            $y++;
            $i++;
        endforeach;
        
        PDF::Output('RESULTADO_SEMIBECAS.pdf');
    }

    public function PDFIntegral()
    {
        $solicitantes = Solicitante::Integral()->with(['postulante'])->join('postulante as p','p.id','=','Semibecas.solicitantes.idpostulante')->orderBy('paterno')->get();
        PDF::SetTitle('PERSONAS QUE OBTUVIERON BECA INTEGRAL');
        PDF::SetAutoPageBreak(false);
        PDF::AddPage('R','A4');
        HeaderPDF();
        FooterPDF();
        
        $altodecelda=5;
        $incremento = 75;
        $numMaxLineas = 40;
        $x = 15;
        $y = 0;
        $i = 0;
        $this->TituloColumnas();
        foreach($solicitantes as $row):
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
            PDF::Cell(95,$altodecelda,$row->postulante->nombre_completo,1);
            #
            PDF::SetXY($x+115, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(20,$altodecelda,$row->postulante->numero_identificacion,1);
            #
            PDF::SetXY($x+135, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(30,$altodecelda,$row->otorga,1);

            $y++;
            $i++;
        endforeach;
        
        PDF::Output('RESULTADO_BECA_INTEGRAL.pdf');
    }

    public function PDFDenegado()
    {
        $solicitantes = Solicitante::Denegado()->with(['postulante'])->join('postulante as p','p.id','=','Semibecas.solicitantes.idpostulante')->orderBy('paterno')->get();
        PDF::SetTitle('SOLICITANTES QUE NO CUMPLIERON CON LOS REQUISITOS');
        PDF::SetAutoPageBreak(false);
        PDF::AddPage('R','A4');
        HeaderPDF();
        FooterPDF();
        
        $altodecelda=5;
        $incremento = 75;
        $numMaxLineas = 40;
        $x = 15;
        $y = 0;
        $i = 0;
        $this->TituloColumnas();
        foreach($solicitantes as $row):
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
            PDF::Cell(95,$altodecelda,$row->postulante->nombre_completo,1);
            #
            PDF::SetXY($x+115, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(20,$altodecelda,$row->postulante->numero_identificacion,1);
            #
            PDF::SetXY($x+135, $y*$altodecelda+$incremento);
            PDF::SetFont('helvetica', '', 10);
            PDF::Cell(30,$altodecelda,$row->otorga,1);

            $y++;
            $i++;
        endforeach;
        
        PDF::Output('RESULTADO_DENEGADOS.pdf');
    }
}
