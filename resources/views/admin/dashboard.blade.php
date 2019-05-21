@extends('admin.template.master')

@section('page-css')
<style>
    .title {
        font-size: 50px;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        display: block;
        text-align: center;
        margin: 20px 0 10px 0px;
    }

    .links {
        text-align: center;
        margin-bottom: 20px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>
@endsection

@section('page-aba-title')
- Dashboard ADMIN
@endsection

@section('page-title')
@endsection

@section('page-title-small')
@endsection

@section('page-content')

<div class="row">
    <div class="col-md-12">
        <div class="title">
            {{env('APP_NAME', 'NOME DO SISTEMA NÃO ESPECIFICADO NO ENV')}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Environment</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped">

                        @foreach($envs as $env)
                        <tr>
                            <td width="120px">{{ $env['name'] }}</td>
                            <td>{{ $env['value'] }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">ENV File</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        @foreach($config_temp as $key => $val)
                        @if($val[0])
                        <tr>
                            <td width="120px">{{ $val[0] }}</td>
                            <td></td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Dependencies</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body dependencies">
                <div class="table-responsive">
                    <table class="table table-striped">
                        @foreach($dependencies as $dependency => $version)
                        <tr>
                            <td width="240px">{{ $dependency }}</td>
                            <td><span class="label label-primary">{{ $version }}</span></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-breadcrumb')
<li class="active">Dashboard</li>
@endsection

@section('page-js')

@endsection
