@extends('layouts.layout')

@section('content')

    <div class="note note-success">
        <h3><b>IMPORTAR INGRESANTES</b></h3>
        <p> Todos los ingresantes deben ingresar con su <b>DNI</b>. </p>
        <p> En caso de no traer <b>DNI</b> como siempre no es novedad. Se debe buscar por sus <b>DATOS</b> o <b>DNI</b>. </p>
    </div>

    <hr>
    
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-bolt"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="">{!! $TotalIngresantes !!}</span>
                </div>
                <div class="desc"> TOTAL DE INGRESANTES </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a href="{!! url('importar-ingresantes') !!}" class="btn btn-success btn-block">
        <span class="fa fa-cloud-upload"></span>
        IMPORTAR</a>
        </div>
    </div>

    {!! Session::get('message') !!}

@stop