@extends('template') 
@section('title', 'my')
@section('content')
<h1>my</h1>
<div class="container-fluid">
	<div class="row">

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
							<th scope="col">verwachte eind datum</th>
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