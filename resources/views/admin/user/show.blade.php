@extends('admin.template.master')

@section('page-css')

@endsection

@section('page-aba-title')
- User
@endsection

@section('page-breadcrumb')
    <li><a href="/administrator/users"><i class="fa fa-user"></i> Usuários </a></li>
    <li><a href="#"><i class="fa fa-user"></i> User
@endsection

@section('page-content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Exibindo Perfil de <b>{{primeiroNome($user->name)}}</b></h3>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <img class="profile-user-img img-responsive img-circle" src="/storage/avatars/{{$user->photo}}">
                        <h3 class="profile-username text-center">{{$user->name}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js')

@endsection
