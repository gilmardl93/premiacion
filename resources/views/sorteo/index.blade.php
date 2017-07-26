@extends('layouts.layout')

@section('content')

    <div class="note note-success">
        <h3><b>SORTEO DE INGRESANTES</b></h3>
    </div>

    <hr>
    
    <div class="row">
    <!--
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="{!! url('sorteo-facultad') !!}">
            <div class="visual">
                <i class="fa fa-spinner"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value=""></span>
                </div>
                <div class="desc"> <h2><b>FACULTAD</b></h2> </div>
            </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="{!! url('sorteo-especialidad') !!}">
            <div class="visual">
                <i class="fa fa-spinner"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value=""></span>
                </div>
                <div class="desc"> <h2><b>ESPECIALIDAD</b></h2> </div>
            </div>
            </a>
        </div>-->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="{!! url('sorteo-general') !!}">
            <div class="visual">
                <i class="fa fa-spinner"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value=""></span>
                </div>
                <div class="desc"> <h2><b>GENERAL</b></h2> </div>
            </div>
            </a>
        </div>
    </div>
@stop