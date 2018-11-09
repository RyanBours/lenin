@extends('template') 
@section('title', 'return')
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
				<h1 class="text-center">Handmatig toevoegen</h1>
				<hr>
				<br>
				<form method="POST" action="/return/add">
				@csrf
				<!-- handmatig zoeken -->
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
				<h1 class="text-center">Retour Checkout</h1>
				<hr>
				<!-- Terug Knop -->
				<div style="text-align:center">
				<a href="/" class="btn btn-leeuw">Terug</a>
				</div>
            <div class="row">
            </div>
			<div class="table-responsive text-nowrap" style="text-align:center">
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
						<td><a class="btn btn-danger btn-sm m-0" href="/return/remove/{{ $item }}"><i class="fas fa-times"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<br>
			<div style=text-align:center;>
            	<!-- knop accepteren -->
				<a class="btn btn-leeuw text-white " onclick="event.preventDefault();
				document.getElementById('checkout-form').submit();">
				Accepteren
			</a>
			<form id="checkout-form" action="/return/checkout" method="POST" style="display: none">
				@csrf
			</form>
			<!-- knop annuleren -->
			<a class="btn btn-leeuw text-white " onclick="event.preventDefault();
				document.getElementById('clear-form').submit();">
				Leegmaken
			</a>
			<form id="clear-form" action="/return/clear" method="POST" style="display: none">
				@csrf
			</form>
			</div>
		</div>
	</div>
</div>
@endsection