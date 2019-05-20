@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('admin.verifiqueSeuEmail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('admin.linkResetarSenhaEnviada.') }}
                        </div>
                    @endif

                    {{ __('admin.antesDePedirOutroLink') }}
                    {{ __('admin.seNaoRecebeuEmail') }}, <a href="{{ route('verification.resend') }}">{{ __('admin.cliquePedirOutro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
