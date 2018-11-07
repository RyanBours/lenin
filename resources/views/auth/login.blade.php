@extends('template')

@push('style')
<style>
	body {
		background-image: url('images/background.png');
		background-repeat: no-repeat;
		background-size: cover;
	}
	
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-leeuw">{{ __('Login') }}</div>

                <div class="card-body mt-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>

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
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-leeuw btn-rounded mb-4">
                                    {{ __('Login') }}
                                </button>
                                <a href="" class="btn btn-leeuw btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Register</a>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>

                    {{-- MODAL --}}               
                    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="POST" id="register-form" action="/register">
                                    @csrf
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mx-3">
                                        
                                            <div class="md-form mb-5">
                                                <i class="fa fa-user prefix grey-text"></i>
                                                <input type="text" id="orangeForm-name" class="form-control validate" name="name">
                                                <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                                            </div>
                                            <div class="md-form mb-5">
                                                <i class="fa fa-envelope prefix grey-text"></i>
                                                <input type="email" id="orangeForm-email" class="form-control validate" name="email">
                                                <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                                            </div>
                            
                                            <div class="md-form mb-4">
                                                <i class="fa fa-lock prefix grey-text"></i>
                                                <input type="password" id="orangeForm-pass" class="form-control validate" name="password">
                                                <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                                            </div>

                                            <div class="md-form mb-4">
                                                <i class="fa prefix grey-text"></i>
                                                <input type="password" id="orangeForm-confirm" class="form-control validate" name="password_confirmation">
                                                <label data-error="wrong" data-success="right" for="orangeForm-confirm">Confirm your password</label>
                                            </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button class="btn btn-leeuw" type="submit">
                                            Sign-up
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
