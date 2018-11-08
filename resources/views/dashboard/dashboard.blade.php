@extends('template') 
@section('title', 'dashboard')
@push('style')
<style>
  /* html,body {
    height: 100%;
  } */

  body {
    background-image: url('/images/leeuwenborgh kleuren.png');
    background-repeat: no-repeat;
    background-size: 3em, auto;
    background-position-x: 2em;
  }

  hr {
		color: #ee7d11;
		background-color: #ee7d11;
		height: 1px !important;
		width: 300px;
	}
</style>
@endpush 
@section('content')
<!-- Title -->
<div class="container-fluid">
  <div class="row justify-content-center mt-5">
    <div class="col" align="center">
      <h1>Hallo, {{Auth::user()->name}}</h1>
      <hr />
      <!-- Logout -->
      <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Uitloggen') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
    </div>
  </div>

  <!-- Knoppen -->
  <div class="row justify-content-center mx-auto mt-5">
    <div class="col-3">
      <a href="/return" class="btn btn-leeuw btn-block" style="height:125px; margin:10px; text-align: center; line-height: 125px">Terugbrengen</a>
    </div>
  </div>
  
  <div class="row justify-content-center mx-auto mt-1">
    <div class="col-5">
      <a href="/dashboard/leen" class="btn btn-leeuw btn-block" style="height:125px; margin:10px; text-align: center; line-height: 125px">Inscannen</a>
    </div>

    <div class="col-5">  
      <a href="/dashboard/my" class="btn btn-leeuw btn-block" style="height:125px; margin:10px; text-align: center; line-height: 125px">Mijn Items</a>
    </div>

    @if (Auth::User()->permission_level > 0)
    <div class="w-100"></div>
    <div class="col-5">
      <a href="/dashboard/item" class="btn btn-leeuw btn-block" style="height:125px; margin:10px; text-align: center; line-height: 125px">Product Toevoegen</a>
    </div>

    <div class="col-5">
      <a href="/dashboard/beheer" class="btn btn-leeuw btn-block" style="height:125px; margin:10px; text-align: center; line-height: 125px">Alles Beheren</a>
    </div>
    @endif
  </div>
</div>
@endsection