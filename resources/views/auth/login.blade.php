@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                
                                {{-- MODAL --}}               
                                <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mx-3">
                                                    <div class="md-form mb-5">
                                                        <i class="fa fa-user prefix grey-text"></i>
                                                        <input type="text" id="orangeForm-name" class="form-control validate">
                                                        <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                                                    </div>
                                                    <div class="md-form mb-5">
                                                        <i class="fa fa-envelope prefix grey-text"></i>
                                                        <input type="email" id="orangeForm-email" class="form-control validate">
                                                        <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                                                    </div>
                                    
                                                    <div class="md-form mb-4">
                                                        <i class="fa fa-lock prefix grey-text"></i>
                                                        <input type="password" id="orangeForm-pass" class="form-control validate">
                                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                                                    </div>
                                    
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button class="btn btn-deep-orange">Sign up</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Registreer</a>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
