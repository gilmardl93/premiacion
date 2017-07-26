<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>COMISION || OFICINA CENTRAL DE ADMISION - OCAD - UNI</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="SISTEMA DE COMISION DE POSTULANTES" name="description" />
        <meta content="OFICINA CENTRAL DE ADMISION - OCAD" name="author" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        {!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
        {!! Html::style('assets/global/css/components.min.css') !!}
        {!! Html::style('assets/global/css/plugins.min.css') !!}
        {!! Html::style('assets/pages/css/login.min.css') !!}

        <link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" /> </head>

    <body class=" login">
        <div class="logo">
            <a href="">
                <img src="{!! asset('assets/layouts/layout/img/logo.png') !!}" alt="" /> </a>
        </div>
        <div class="content">

            {!! Session::get('message') !!}

            {!! Form::open(['url' => 'iniciar-sesion', 'method' => 'POST']) !!}
                <h3 class="form-title font-green">INICIAR SESION</h3>
                <div class="form-group">
                    {!! Form::text('dni',null,['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Usuario']) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password',['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Contraseña']) !!}
                    
                <div class="form-actions">
                    {!! Form::submit('INGRESAR',['class' => 'btn green uppercase']) !!}
                </div>
            {!! Form::close() !!}
        </div>

        <div class="copyright"> <?php echo date('Y') ?> | Oficina Central de Admisión - OCAD</div>

        {!! Html::script('assets/global/plugins/jquery.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('assets/global/plugins/js.cookie.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery.blockui.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
        {!! Html::script('assets/global/scripts/app.min.js') !!}

    </body>

</html>