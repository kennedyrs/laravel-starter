@extends('admin.template.master')

@section('page-css')

@endsection

@section('page-aba-title')
- Novo Usuário
@endsection

@section('page-breadcrumb')
    <li><a href="{{Route('admin.user.index')}}/administrator/users"><i class="fa fa-users"></i>Usuários </a></li>
    <li><i class="fa fa-user-plus"></i> Novo
@endsection

@section('page-content')

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title"><b><i>{{primeiroNome(Auth::user()->name)}}</i></b> você está prestes a cadastrar um novo usuário</h3>
            </div>
            <br>
            <form class="form-group" method="POST" action="{{ Route('admin.user.create.save')}}" enctype="multipart/form-data">
                @csrf
                <div class="box-body">

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Nome</label>
                        <input id="name" name="name" type="text" class="form-control input-lg" value="{{ old('name')}}" required autofocus minlength="6">
                        @if ($errors->has('name'))
                            <span class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" class="form-control input-lg" value="{{ old('email')}}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone">Telefone</label>
                        <input id="phone" name="phone" type="text" class="form-control input-lg" value="{{ old('phone')}}" required autofocus minlength="11">
                        @if ($errors->has('phone'))
                            <span class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                        <label for="photo">Foto</label>
                        <input type="file" id="photo" name="photo" accept="image/.jpeg,.png,.jpg,.gif,.svg">

                        <p class="help-block">Escolha uma foto para o perfil</p>
                        @if ($errors->has('photo'))
                            <span class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first('photo') }}</span>
                        @endif
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-block">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-js')

@endsection
