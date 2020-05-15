@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">{{ __('Necesitas verificar tu correo') }}</div>
                <div class="card-body register-card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Un nuevo link de verificación fue enviado a tu correo') }}
                    </div>
                    @endif
                    {{ __('Bienvenido, por favor verifica tu cuenta para que podamos continuar') }}
                    {{ __('Si aún no recibes el correo') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-block">{{ __('Click aquí para reenviar') }}</button>
                    </form>

                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </div>
</div>
@endsection