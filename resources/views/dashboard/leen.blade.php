@extends('template') 
@section('title', 'leen') 
@section('content')
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
  hr{
   color: #ee7d11;
   background-color: #ee7d11;
   height: 1px;
   width: 350px;
  }
</style>
@endpush

<div class="container-fluid">
	<div class="row">	
		<div class="col-4">			
			<h1 class="text-center">Handmatig invoeren</h1>
			<hr>
			<form method="POST" action="/item/leen/add">
				@csrf
					<br>
				<div class="form-group row">
					<label for="id" class="col-md-3 col-form-label text-md-right">{{ __('ID') }}</label>
					<div class="col-md-6">
						<input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('email') }}" required autofocus>
							@if ($errors->has('id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('id') }}</strong>
							</span>
							@endif
					</div>
				</div>
					<br>
				<div class="form-group row mb-5">
					<div class="col-md-3 offset-md-3">
						<button type="submit" class="btn btn-leeuw text-white ">
							{{ __('Product toevoegen') }}
						</button>
					</div>
				</div>
			</form>
		</div>

		<div class="col-5">
				<h1 class="text-center">Leen Checkout</h1>
				<hr>
			<div class="row">
				</div>
			<div class="table-responsive text-nowrap">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">id</th>
							<th scope="col">name</th>
							<th scope="col">start datum</th>
							<th scope="col">eind datum</th>
							<th scope="col">leen duur</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						@foreach (($cart ? $cart : []) as $item)
						<tr>
							<th scope="row">{{ $item->id }}</th>
							<td>{{ $item->name }}</td>
							<td>Cell</td>
							<td>Cell</td>
							<td>Cell</td>
						<td><a class="btn btn-danger btn-sm m-0" href="/item/leen/remove/{{ $item }}"><i class="fas fa-times"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- knop accepteren -->
			<a class="btn btn-leeuw text-white " onclick="event.preventDefault();
			document.getElementById('checkout-form').submit();">
			Accepteren
		</a>
		<form id="checkout-form" action="/item/leen/checkout" method="POST" style="display: none">
			@csrf
		</form>
		<!-- knop annuleren -->
		<a class="btn btn-leeuw text-white "  onclick="event.preventDefault();
			document.getElementById('clear-form').submit();">
			Annuleren
		</a>
		<form id="clear-form" action="/item/leen/clear" method="POST" style="display: none">
			@csrf
		</form>
		 <!-- Terug Knop -->
		 <a href="/dashboard" class="btn btn-leeuw btn-rounded ">Terug</a>
		 
		 <!-- NFC KOLOM -->
		</div>
		<div class="col-3">
			<h1 class="text-center">NFC Scan</h1>
			<hr>
			<br>
			<div class="card-body bg-leeuw text-white "style="text-align:center">Scan je product</div>
		</div>
	</div>
</div>
@endsection