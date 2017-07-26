@extends('layouts.layout')

@section('content')

    <div class="note note-success">
        <h3><b>DIPLOMAS DE PRIMEROS PUESTOS</b></h3>
    </div>

    <hr>

    <iframe src="{!! url('PDFdiploma') !!}" width="1000" height="700"></iframe>
@stop