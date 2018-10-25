@extends('template') 
@section('title', 'index')

@push('style')
<style>
	body {
		background-image: url('images/background.png');
		background-repeat: no-repeat;
		background-size: cover;
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
					<form class="form-signin">
						<hr class="my-4">
						<button class="btn btn-lg btn-leeuw btn-block text-uppercase" type="submit">Scan je pasje</button>
						<hr class="my-4">
						<p class="text-center"><a href="" class="text-primary">Log in zonder NFC</a></p> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection