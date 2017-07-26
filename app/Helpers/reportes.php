<?php
    function HeaderPDF()
    {
        PDF::Image('logo-uni.jpg', 5, 5, 18, null);
        PDF::SetXY(23,6);
        PDF::SetFont('Helvetica','B',10);
        PDF::Cell(50,7,'UNIVERSIDAD NACIONAL DE INGENIERÍA');
        PDF::SetXY(23,12);
        PDF::SetFont('Helvetica','B',10);
        PDF::Cell(50,7,'OFICINA CENTRAL DE ADMISIÓN');
        PDF::SetXY(23,18);
        PDF::SetFont('Helvetica','B',10);
        PDF::Cell(100,7,'CONCURSO DE ADMISIÓN 2017-2');
    }
    
    function FooterPDF()
    {
        PDF::SetY(-15);
        PDF::SetFont('helvetica', 'I', 8);
        PDF::Cell(0, 10, 'Pagina '.PDF::getAliasNumPage().'/'.PDF::getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

?>