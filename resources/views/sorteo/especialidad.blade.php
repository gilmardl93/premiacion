@extends('layouts.layout')

@section('content')

    <div class="note note-success">
        <h3><b>SORTEO POR ESPECIALIDAD</b></h3>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-1">
            <a href="{!! url('sorteo') !!}" class="btn btn-danger">ATRAS</a>
        </div>
        {!! Form::open(['method' => 'POST', 'url' => 'sorteo-especialidad-ingresante']) !!}
        <div class="col-md-6">
            {!! Form::select('especialidades',$especialidades,null,['class' => 'form-control']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::submit('BUSCAR AL AZAR',['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <hr>
    
    {!! Session::get('message') !!}
    
@stop