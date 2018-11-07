@extends('template') 
@section('title', 'add')
@push('style')
<style>
  html,body {
    height: 100%;
  }

  body {
    background-image: url('/images/leeuwenborgh kleuren.png');
    background-repeat: no-repeat;
    background-size: 3em, auto;
    background-position-x: 2em;
  }
</style>
@endpush
@section('content')

@if(Session::has('status'))
<div class="alert {{ session('alert-class') }}" role="alert">{{ session('status') }}</div>
@endif

<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-leeuw text-white">{{ __('Nieuw product toevoegen') }}</div>

                <div class="card-body">
                    <form method="POST" action="/dashboard/add/post">
                        @csrf
                    <!--- toevoegen product naam -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product naam') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <!--- toevoegen NFC -->
                        <div class="form-group row">
                            <label for="NFC" class="col-md-4 col-form-label text-md-right">{{ __('NFC Code') }}</label>

                            <div class="col-md-6">
                                <input id="NFC" type="text" class="form-control{{ $errors->has('NFC') ? ' is-invalid' : '' }}" name="NFC" value="{{ old('NFC') }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('NFC') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <!--- toevoegen Leenduur -->
                        <div class="form-group row">
                            <label for="Leenduur" class="col-md-4 col-form-label text-md-right">{{ __('Leenduur') }}</label>

                            <div class="col-md-6">
                                <input id="Leenduur" type="text" class="form-control{{ $errors->has('Leenduur') ? ' is-invalid' : '' }}" name="Leenduur" value="{{ old('Leenduur') }}">

                                @if ($errors->has('Leenduur'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Leenduur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- TOEVOEG KNOP --->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-leeuw btn-rounded mb-4">
                                    {{ __('Product toevoegen') }}
                                </button>

                        <!-- Terug Knop -->
                                <a href="/dashboard" class="btn btn-leeuw btn-rounded mb-4">Annuleren</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection