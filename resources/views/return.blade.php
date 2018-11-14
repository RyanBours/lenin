@extends('template') 
@section('title', 'return')
@section('content')
@push('style')
<style>
  body {
    background-image: url('/images/leeuwenborgh kleuren.png');
    background-repeat: no-repeat;
    background-size: 3em, auto;
    background-position-x: 2em;
  }
  hr{
    color: #ee7d11;
    background-color: #ee7d11;
    height: 1px;
    width: 350px;
  }
</style>
@endpush
@section('content')
@if(Session::has('status'))
<div class="alert {{ session('alert-class') }}" role="alert">{{ session('status') }}</div>
@endif
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <h1 class="text-center mt-5">Return Checkout</h1>
      <hr>
      <!-- Terug Knop -->
      <div style="text-align:center">
        <a href="/dashboard" class="btn btn-leeuw">Terug</a>
      <div>
    </div>
  </div>
  <br>
  <div class="row h-100">
    <!-- buffer -->
    <div class ="col-1">
      </div>
    <div class="col-3">
      <div class="text-center mb-5">
        <h1>NFC Scan</h1>
        <hr>
        <div class="card-body bg-leeuw text-white">Scan je product</div>
      </div>
      <h1 class="text-center">Handmatig toevoegen</h1>
      <hr>
      <form method="POST" action="/return/add">
        @csrf
        <!-- handmatig zoeken -->
        <div class="form-group row">
          <label for="id" class="col-md-3 col-form-label text-md-right">{{ __('ID') }}</label>
          <div class="col-md-6">
            <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('id'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('id') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <br>
        <div class="form-group row mb-5">
          <div class="col-md-3 offset-md-3">
            <button type="submit" class="btn btn-leeuw text-white ">
              {{ __('Product toevoegen') }}
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-8">
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">start date</th>
              <th scope="col">expected return date</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach (($cart ? $cart : []) as $item)
            <tr>
              <th scope="row">{{ $item->id }}</th>
              <td>{{ $item->name }}</td>
              <td>{{ $item->loan()->start_date }}</td>
              <td>{{ $item->loan()->expected_end_date}}</td>
              <td><a class="btn btn-danger btn-sm m-0" href="/return/remove/{{ $item }}"><i class="fas fa-times"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div style=text-align:center;>
        <!-- knop accepteren -->
        <a class="btn btn-leeuw text-white " onclick="event.preventDefault();
          document.getElementById('checkout-form').submit();">
          UitChecken
        </a>
        <form id="checkout-form" action="/return/checkout" method="POST" style="display: none">
          @csrf
        </form>
        <!-- knop annuleren -->
        <a class="btn btn-leeuw text-white " onclick="event.preventDefault();
          document.getElementById('clear-form').submit();">
          Leegmaken
        </a>
        <form id="clear-form" action="/return/clear" method="POST" style="display: none">
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
