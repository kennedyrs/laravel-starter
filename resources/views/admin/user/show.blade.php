@extends('admin.template.master')

@section('page-css')

@endsection

@section('page-aba-title')
- User
@endsection

@section('page-breadcrumb')
    <li><a href="/administrator/users"><i class="fa fa-users"></i>Usuários </a></li>
    <li><i class="fa fa-user"></i> User
@endsection

@section('page-content')

<div class="row">
    <div class="col-sm-8">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Exibindo Perfil de <b>{{primeiroNome($user->name)}}</b></h3>
            </div>

            <div class="box-body">
                <img class="profile-user-img img-responsive img-circle" src="/storage/avatars/{{$user->photo}}">
                <p class="text-muted text-center"><i>Cadastrado em</i>  {{date_format($user->created_at, 'd/m/Y')}}</p>
                <br>
                <li class="list-group-item">
                    <b>NOME</b> <a class="pull-right">{{$user->name}}</a>
                </li>
                <li class="list-group-item">
                    <b>EMAIL</b> <a class="pull-right">{{$user->email}}</a>
                </li>
                <li class="list-group-item">
                    <b>TELEFONE</b> <a class="pull-right">{{$user->phone ?: 'Vazio'}}</a>
                </li>

                <a href="{{Route('admin.user.edit', ['id'=>$user->id])}}" class="btn btn-success btn-block"><b>Editar</b></a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">GRUPOS</h3>
            </div>
            <div class="box-body">
                @foreach($user->roles as $role)
                    <h3 class="profile-username text-center"><span class="label label-success">{{$role->name}}</span></h3>
                @endforeach
            </div>
            <br>
            <div class="box-header">
                <h3 class="box-title">PERMISSÕES</h3>
            </div>
            <div class="box-body">
                <p>
                @foreach($user->getAllPermissions() as $permission)
                    <span class="label label-info label-permissions">{{$permission->name}}</span>
                @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')

@endsection
