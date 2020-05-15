@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">{{ __('Register') }}</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <!-- Asignacion de Rol dentro de la plataforma -->
                        <div class="form-group clearfix">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="rol" value="0" id="radioSuccess1">
                                <label for="radioSuccess1">
                                    Especialista
                                </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" name="rol" value="1" id="radioSuccess2">
                                <label for="radioSuccess2">
                                    Paciente
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        Acepta los <a href="#">terminos de contrato</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </div>
</div>
@endsection