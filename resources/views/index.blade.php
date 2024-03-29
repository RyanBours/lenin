@extends('template') 
@section('title', 'index')

@push('style')
<style>
	body {
    background-image: url('/images/leeuwenborgh kleuren.png');
    background-repeat: no-repeat;
    background-size: 3em, auto;
    background-position-x: 2em;
  }
  .marginauto {
    margin: 10px auto 20px;
    display: block;
}

</style>
@endpush

@section('content')
<div class="container">
	<img class="marginauto img-fluid" src="images/LogoLeeuw.png" alt="Leeuwenborgh logo" width="300" height="300">
	<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Aanmelden</h5>
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