@extends('template') 
@section('title', 'Reset')
@section('content')
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
<img class="marginauto img-fluid" src="../images/LogoLeeuw.png" alt="Leeuwenborgh logo" width="300" height="300">
<div class="container" style="position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-leeuw text-white text-center">Reset</div>
                <div class="card-body">
                    <p>Uw wachtwoord is gewijzigd.</p>
                </div>
                <a class="btn btn-leeuw text-white" href="/login">
                    Terug naar login
                </a>
            </div>
        </div>
    </div>
</div>

@endsection