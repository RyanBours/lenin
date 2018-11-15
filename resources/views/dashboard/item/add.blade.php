@extends('template') 
@section('title', 'Item - Add')
@push('style')
<style>
  body {
    background-image: url('/images/leeuwenborgh kleuren.png');
    background-repeat: repeat-y;
    background-size: 3em, auto;
    background-position-x: 2em;
  }

    hr {
    color: #ee7d11;
    background-color: #ee7d11;
    height: 1px !important;
    width: 400px;
 }
</style>
@endpush

@section('content')
@if(Session::has('status'))
<div class="alert {{ session('alert-class') }}" role="alert">{{ session('status') }}</div>
@endif

<div class="container">
    <h1 class="text-center mt-5">Beheer</h1>
    <hr>
    <div class="row justify-content-center">
        <a href="/dashboard" class="btn btn-leeuw btn-rounded mb-4">Terug</a>
    </div>
    <div class="row justify-content-center align-items-center mt-3">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-leeuw text-white">{{ __('Nieuw product toevoegen') }}</div>

                <div class="card-body">
                    <form method="POST" action="/dashboard/item/add">
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
                            <label for="Leenduur" class="col-md-4 col-form-label text-md-right">{{ __('Maximale Leenduur (dagen)') }}</label>

                            <div class="col-md-6">

                                <input id="Leenduur" type="text" class="form-control{{ $errors->has('Maximale Leenduur') ? ' is-invalid' : '' }}" name="Leenduur" value="{{ old('Leenduur') ? old('Leenduur') : 0 }}">

                                @if ($errors->has('Leenduur'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Leenduur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--- toevoegen description -->
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">

                                <textarea id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--- toevoegen comment -->
                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('comment') }}</label>

                            <div class="col-md-6">

                                <textarea id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment">{{ old('comment') }}</textarea>

                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive text-nowrap mt-3">
                <form action="">
                    <input class="form-control" placeholder="Zoek" aria-label="Zoek" type="search" name="q" value="{{ $q ? $q : '' }}">
                </form>
				<table class="table table-hover table-striped table-bordered mt-3">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Naam</th>
                            <th scope="col">NFC</th>
                            <th scope="col">Maximale Leenduur</th>
                            <th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($items as $item)
						<tr>
							<th scope="row">{{ $item->id }}</th>
							<td>{{ $item->name }}</td>
                            <td>{{ $item->nfc_code }}</td>
                            <td>{{ $item->max_loan_duration }}</td>
                            <td align="center">
                                <a class="btn btn-warning btn-sm m-0" href="/dashboard/item/edit/{{ $item->id }}">
                                    edit
                                </a>
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection