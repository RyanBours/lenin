@extends('template') 
@section('title', '404')
@section('content')
<h1>404</h1>
<h2>{{ $exception->getMessage() }}</h2>
<a class="btn btn-leeuw btn-lg" href="/">home</a>
@endsection