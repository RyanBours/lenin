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

<div class="container-fluid" style="margin-top: 2%">
	<div class="row">
		<!-- buffer -->
		<div class ="col-1">
		</div>
			<!-- NFC Code -->
		<div class="col-3">
				<div style="height: 300px;" >
					<h1 class="text-center">NFC Scan</h1>
					<hr>
					<br>
					<br>
					<div class="card-body bg-leeuw text-white "style="text-align:center">Scan je product</div>
					<br>
				</div>
			<!-- handmatig invoeren -->			
			<h1 class="text-center">Handmatig toevoegen</h1>
			<hr>
			<form method="POST" action="/dashboard/leen/add">
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

		<!-- buffer -->
		<div class ="col-1">
			</div>

		<div class="col-6">
				<h1 class="text-center">Leen Checkout</h1>
				<hr>
				<!-- Terug Knop -->
				<div style="text-align:center">
					 <a href="/dashboard" class="btn btn-leeuw">Terug</a>
				<div>
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
							<td>{{ $item->start_date }}</td>
							<td>{{ $item->expected_end_date }}</td>
							<td>{{ $item->expected_end_date - $item->start_date }}</td>
						<td><a class="btn btn-danger btn-sm m-0" href="/dashboard/leen/remove/{{ $item }}"><i class="fas fa-times"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<br>
			<!-- knop accepteren -->
			<a class="btn btn-leeuw text-white " onclick="event.preventDefault();
			document.getElementById('checkout-form').submit();">
			Accepteren
		</a>
		<form id="checkout-form" action="/dashboard/leen/checkout" method="POST" style="display: none">
			@csrf
		</form>
		<!-- knop annuleren -->
		<a class="btn btn-leeuw text-white "  onclick="event.preventDefault();
			document.getElementById('clear-form').submit();">
			Leegmaken
		</a>
		<form id="clear-form" action="/dashboard/leen/clear" method="POST" style="display: none">
			@csrf
		</form>
	</div>
</div>
@endsection