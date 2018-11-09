@extends('template') 
@section('title', 'Item - Edit')
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
                <div class="card-header bg-leeuw text-white">{{ __('Product aanpassen') }}</div>

                <div class="card-body">
                    <form method="POST" action="/dashboard/item/edit/{{$item->id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product naam') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $item->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="NFC" class="col-md-4 col-form-label text-md-right">{{ __('NFC Code') }}</label>

                            <div class="col-md-6">
                                <input id="NFC" type="text" class="form-control{{ $errors->has('NFC') ? ' is-invalid' : '' }}" name="NFC" value="{{ old('NFC') ? old('NFC') : $item->nfc_code }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Leenduur" class="col-md-4 col-form-label text-md-right">{{ __('Maximale Leenduur (dagen)') }}</label>

                            <div class="col-md-6">
                                <input id="Leenduur" type="text" class="form-control{{ $errors->has('Leenduur') ? ' is-invalid' : '' }}" name="Leenduur" value="{{ old('Leenduur') ? old('Leenduur') : $item->max_loan_duration }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-leeuw btn-rounded mb-4">
                                    {{ __('Product updaten') }}
                                </button>

                                <a href="/dashboard/item" class="btn btn-leeuw btn-rounded mb-4">Annuleren</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection