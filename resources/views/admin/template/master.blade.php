<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __('admin.titulo') }}@yield('page-aba-title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('admin.template._css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">
        @include('admin.template._header')
        @include('admin.template._menu')

        <div class="content-wrapper">
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="/"><i class="fa fa-dashboard"></i> Home </a></li>
                    @yield('page-breadcrumb')
                </ol>
            </section>
            <br class="hidden-xs hidden-sm">
            <section class="content">
                @yield('page-content')
            </section>
        </div>
        
        @include('admin.user.alterar-senha')

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> {{env('APP_VERSION', 'APP VERSION NOT DEFINED')}}
            </div>
            <strong>Copyright &copy; {{\Carbon\Carbon::now()->format('Y')}} <a href="https://kennedy.io" target="_blank">Kennedy Studio</a>.</strong> All rights
            reserved.
        </footer>

        <div class="control-sidebar-bg"></div>
    </div>

    @include('admin.template._js')
</body>

</html>
