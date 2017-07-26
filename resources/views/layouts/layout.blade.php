<!DOCTYPE html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>PREMIACION | OFICINA CENTRAL DE ADMISION - OCAD - UNI</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Sorteo de Comision de Postulantes" name="description" />
        <meta content="Oficina Central de Admisión" name="author" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        {!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}

        {!! Html::style('assets/global/css/components.min.css') !!}
        {!! Html::style('assets/global/css/plugins.min.css') !!}

        @yield('css-style')

        {!! Html::style('assets/layouts/layout/css/layout.min.css') !!}
        {!! Html::style('assets/layouts/layout/css/themes/darkblue.min.css') !!}
        {!! Html::style('assets/layouts/layout/css/custom.min.css') !!}

        <link rel="shortcut icon" href="favicon.ico" /> </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

        <div class="page-wrapper">
            
            @include('layouts.partials.header')

            <div class="clearfix"> </div>

            <div class="page-container">

                @include('layouts.partials.sidebar')

                <div class="page-content-wrapper">

                    <div class="page-content">

                        @yield('content')
                        
                    </div>

                </div>

            </div>

            @include('layouts.partials.footer')

        </div>

        {!! Html::script('assets/global/plugins/jquery.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('assets/global/plugins/js.cookie.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
        {!! Html::script('assets/global/plugins/jquery.blockui.min.js') !!}
        {!! Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}

        @yield('js-script')

        {!! Html::script('assets/global/scripts/app.min.js') !!}

        {!! Html::script('assets/layouts/layout/scripts/layout.min.js') !!}
        {!! Html::script('assets/layouts/layout/scripts/demo.min.js') !!}
        {!! Html::script('assets/layouts/global/scripts/quick-sidebar.min.js') !!}

    </body>