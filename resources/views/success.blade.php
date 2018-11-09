@extends('template') 
@section('title', 'Success')

@push('style')
<style>
	body {
		background-image: url('images/success.png');
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center center;
		background-attachment: fixed;		
	}	
</style>

@section('content')

<div class="container">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8" style="margin-top:15em;">
			<h1>Success!</h1>

			@if (Auth::User()->permission_level > 0)
				<a class="btn btn-leeuw btn-lg" href="/dashboard">Terug</a>
			@else
				<a class="btn btn-leeuw btn-lg" href="/">Uitloggen</a>
			@endif
		</div>
	</div>
</div>

@endsection