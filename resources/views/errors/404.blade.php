@extends('template') 
@section('title', '404')
@push('style')
<style>
  html,body {
    height: 100%;
  }

  body {
        background-image: url('images/attack on dickus.png');
		background-repeat: no-repeat;
		background-size: cover;
  }


  
</style>
@endpush 
@section('content')
<h1 class="text-white">Sorry... Deze pagina bestaat niet meer.</h1>
<h2>{{ $exception->getMessage() }}</h2>
<a class="btn btn-leeuw btn-lg" href="/">home</a>
@endsection