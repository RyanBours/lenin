@extends('template') 
@section('title', 'index')

@push('style')
<style>
	body {
		background-image: url('images/background.png');
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center center;
		background-attachment: fixed;		
	}
	
</style>
@endpush

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top: 200px;">
			<div class="card card-signin my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Sign In</h5>
					<hr class="my-4">
					<div class="card-body bg-leeuw text-white text-uppercase text-center">Scan pasje</div>
					<hr class="my-4">
					<p class="text-center"><a href="/login" class="text-primary">Log in zonder NFC</a></p> 
				</div>
			</div>
			<a class="btn btn-leeuw btn-block mt-0" href="/return">Retourneren</a>
		</div>
	</div>
</div>

@endsection