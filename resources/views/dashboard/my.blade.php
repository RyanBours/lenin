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
							<th scope="col">leen duur</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($loans as $loan)
						<tr>
							<th scope="row">{{ $loan->id }}</th>
							<td>{{ $loan->name }}</td>
							<td>Cell</td>
							<td>Cell</td>
							<td>Cell</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
        </div>
        
	</div>
</div>
@endsection