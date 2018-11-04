@extends('template') 
@section('title', 'leen') 
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-2">
			<h1>manual add</h1>
			<form method="POST" action="/item/leen/add">
				@csrf

				<div class="form-group row">
					<label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>
					<div class="col-md-6">
						<input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('email') }}" required autofocus>
							@if ($errors->has('id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('id') }}</strong>
							</span>
							@endif
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="btn btn-primary">
							{{ __('Add') }}
						</button>
					</div>
				</div>
			</form>
		</div>

		<div class="col-8">
			<h1>Checkout</h1>
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
            <a class="btn btn-leeuw" onclick="event.preventDefault();
                document.getElementById('checkout-form').submit();">
                Confirm checkout
            </a>
            <form id="checkout-form" action="/item/leen/checkout" method="POST" style="display: none;">
                @csrf
            </form>
		</div>

		<div class="col-2">
			<h1>instructie</h1>
		</div>
	</div>
</div>
@endsection