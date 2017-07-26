@extends('layouts.layout')

@section('css-style')
@stop

@section('content')

    <div class="note note-success">
        <h3><b>REGISTRAR PRIMEROS PUESTOS</b></h3>
        <p> Se debe ingresar el <b>DNI</b> de los primeros puestos para registrar. </p>
        <p> Se debe ingresar el <b>PUESTO</b> del ingresante. </p>
    </div>

    <hr>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['url' => 'registrar-primeros-puestos', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-4">
            {!! Form::text('dni',null,['class' => 'form-control', 'placeholder' => 'Ingresar DNI', 'autofocus' => 'true']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::text('puesto',null,['class' => 'form-control', 'placeholder' => 'Ingresar DNI', 'placeholder' => 'Ejemplo: PRIMER PUESTO']) !!}
        </div>
        <div class="col-md-1">
            {!! Form::submit('REGISTRAR',['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    <br>
    {!! Session::get('message') !!}

    <hr>
    <h3><b>LISTADO DE PRIMEROS PUESTOS</b></h3>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>DNI</th>
                <th>CODIGO</th>
                <th>NOMBRES Y APELLIDOS</th>
                <th>PUESTO</th>
            </tr>
        </thead>
        <tbody>
            @foreach($primeros as $row)
            <tr>
                <td>{!! $row->numero_identificacion !!}</td>
                <td>{!! $row->codigo !!}</td>
                <td>{!! $row->paterno !!} {!! $row->materno !!} {!! $row->nombres !!}</td>
                <td>{!! $row->puesto !!}</td>
            </tr>
            @endforeach
        </tbody>
        {!! $primeros->links() !!}
    </table>
@stop

@section('js-script')
@stop