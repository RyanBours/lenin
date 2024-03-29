@extends('template')
@push('style')
<style>
	body {
    background-image: url('/images/leeuwenborgh kleuren.png');
    background-repeat: no-repeat;
    background-size: 3em, auto;
    background-position-x: 2em;
  }
  .marginauto {
    margin: 10px auto 20px;
    display: block;
}

</style>
@endpush

@section('content')
<div class="container">
    <img class="marginauto img-fluid" src="../images/LogoLeeuw.png" alt="Leeuwenborgh logo" width="300" height="300">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header bg-leeuw text-white ">{{ __('Wachtwoord herstellen') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail adres :') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div>
                            <div style="text-align:center">
                                <button type="submit" class="btn btn btn-leeuw">
                                    {{ __('Stuur wachtwoord herstel link') }}
                                </button>
                                <a href="/dashboard" class="btn btn-leeuw">Terug</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
