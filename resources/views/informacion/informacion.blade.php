@extends('layouts.layout')

@section('css-style')
{!! Html::style('assets/global/plugins/bootstrap-summernote/summernote.css') !!}
@stop

@section('content')
    <div class="note note-primary">
        <h3>ACTUALIZAR INFORMACION</h3>
        <p> <h3>CONCURSO DE ADMISIÓN 2017-2</h3></p>
    </div>

    <hr>

    {!! Session::get('message') !!}

    {!! Form::open(['url' => 'actualizar-informacion', 'method' => 'POST']) !!}

    @foreach($informacion as $row)
    <input type="hidden" name="id" value="{!! $row->id !!}">
    {!! Form::textarea('informacion',$row->informacion,['id' => 'summernote_1']) !!}

    <div class="row">
        <div class="col-md-4">
            {!! Form::label('FIRMA 1') !!}
            {!! Form::text('firma_1',$row->firma_1,['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('FIRMA 2') !!}
            {!! Form::text('firma_2',$row->firma_2,['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('FIRMA 3') !!}
            {!! Form::text('firma_3',$row->firma_2,['class' => 'form-control']) !!}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            {!! Form::label('CARGO 1') !!}
            {!! Form::text('cargo_1',$row->cargo_1,['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('CARGO 2') !!}
            {!! Form::text('cargo_2',$row->cargo_2,['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::label('CARGO 3') !!}
            {!! Form::text('cargo_3',$row->cargo_3,['class' => 'form-control']) !!}
        </div>
    </div>
    <br>
    @endforeach

    {!! Form::submit('ACTUALIZAR',['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

@stop

@section('js-script')
{!! Html::script('assets/global/plugins/bootstrap-summernote/summernote.min.js') !!}
{!! Html::script('assets/pages/scripts/components-editors.min.js') !!}
@stop 