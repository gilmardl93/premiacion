@extends('layouts.layout')

@section('content')

    <div class="note note-success">
        <h3><b>ASISTENCIA</b></h3>
        <p> Todos los ingresantes deben ingresar con su <b>DNI</b>. </p>
        <p> En caso de no traer <b>DNI</b> como siempre no es novedad. Se debe buscar por sus <b>DATOS</b> o <b>DNI</b>. </p>
    </div>

    <hr>

    {!! Form::open(['url' => 'ingresar-asistencia', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-4">
        {!! Form::text('dni',null, ['class' => 'form-control', 'placeholder' => 'DNI', 'maxlength' => '8', 'id' => 'dni', 'autofocus' => 'true']) !!}
        </div>
        <div class="col-md-2">
        {!! Form::submit('REGISTRAR', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    <hr>

    {!! Session::get('message') !!}

    <iframe src="{!! route('PDFAsistencia') !!}"  width="900" height="550"></iframe>
    
@stop
