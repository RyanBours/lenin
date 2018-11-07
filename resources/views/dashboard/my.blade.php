@extends('template') 
@section('title', 'my') @push('style')
<style>
	body {
		background-image: url('/images/leeuwenborgh kleuren.png');
		background-repeat: no-repeat;
		background-size: 3em, auto;
		background-position-x: 2em;
	}

	table {
		margin-top: 100px;
	}

	hr {
		color: #ee7d11;
		background-color: #ee7d11;
		height: 1px !important;
		width: 400px;
	}
</style>


@section('content')

<div class="container-fluid">
	<h1 class="text-center pt-5">My Checkout</h1>
	<hr>
	<div class="row justify-content-center">
		<div class="col-2 md-auto" align="center">
			<a href="/dashboard" class="btn btn-leeuw">Terug</a>
		</div>
	</div>
	<div class="row">
		<div class="col-2">
		</div>
		<div class="col-8">
			<div class="table-responsive text-nowrap">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Naam</th>
							<th scope="col">Start Datum</th>
							<th scope="col">Eind Datum</th>
							<th scope="col">Verwachte Eind Datum</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($loans as $loan)
						<tr class="{{ !$loan->isReturned() ? 'bg-warning' : ''}}">
							<th scope="row">{{ $loan->id }}</th>
							<td>{{ $loan->item->name }}</td>
							<td>{{ $loan->start_date }}</td>
							<td>{{ $loan->end_date }}</td>
							<td>{{ $loan->expected_end_date }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection