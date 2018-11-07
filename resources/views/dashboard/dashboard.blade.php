@extends('template') 
@section('title', 'dashboard')
@push('style')
<style>
  html,body {
    height: 100%;
  }

  body {
    background-image: url('/images/leeuwenborgh kleuren.png');
    background-repeat: no-repeat;
    background-size: 3em, auto;
    background-position-x: 2em;
  }
  
</style>
@endpush 
@section('content')
<!-- Title -->

<div class="container-fluid">
  <div class="row justify-content-center mt-5">
    <div class="col-3">
      <!-- Logout -->
      <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
    <div class="col-6" style="margin-left:150px">
      <h1>Hallo, {{Auth::user()->name}}</h1>
    </div>

  </div>


  <!-- Knoppen -->
    <div class="row justify-content-center align-items-center mx-auto" style="margin-top:150px">
      <div class="col-5">
        <a href="/item/leen" class="btn btn-leeuw btn-block" style="height:125px; margin:10px; text-align: center; line-height: 125px">Inscannen</a>
      </div>

      <div class="col-5">  
        <a href="/item/my" class="btn btn-leeuw btn-block" style="height:125px; margin:10px; text-align: center; line-height: 125px">Mijn Items</a>
      </div>


      <div class="w-100"></div>

      <div class="col-5">
        <a href="/item/add" class="btn btn-leeuw btn-block" style="height:125px; margin:10px; text-align: center; line-height: 125px">Product Toevoegen</a>
      </div>

      <div class="col-5">
        <a href="/item/beheer" class="btn btn-leeuw btn-block" style="height:125px; margin:10px; text-align: center; line-height: 125px">Alles Beheren</a>
      </div>
    </div>
</div>
@endsection