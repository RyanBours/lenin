@extends('template') 
@section('title', 'Item - Add')
@push('style')
<style>
  body {
    background-image: url('/images/leeuwenborgh kleuren.png');
    background-repeat: repeat-y;
    background-size: 3em, auto;
    background-position-x: 2em;
  }

    hr {
    color: #ee7d11;
    background-color: #ee7d11;
    height: 1px !important;
    width: 400px;
 }
</style>
@endpush

@section('content')
@if(Session::has('status'))
<div class="alert {{ session('alert-class') }}" role="alert">{{ session('status') }}</div>
@endif

<div class="container-fluid">
    <h1 class="text-center mt-5">Beheer</h1>
    <hr>
    <div class="row justify-content-center">
        <a href="/dashboard" class="btn btn-leeuw btn-rounded mb-4">Terug</a>
    </div>
    <div class="row justify-content-center align-items-center mt-3">
        <div class="col-md-10">
            <div class="row">
                <a href="/dashboard/item/add" class="btn btn-leeuw ml-auto">Product Toevoegen</a>
                <div class="table-responsive text-nowrap mt-3">
                    <form action="">
                        <input class="form-control mr-auto" placeholder="Zoek" aria-label="Zoek" type="search" name="q" value="{{ $q ? $q : '' }}">
                    </form>
                    <table class="table table-hover table-striped table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Naam</th>
                                <th scope="col">NFC</th>
                                <th scope="col">Maximale Leenduur</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nfc_code }}</td>
                                <td>{{ $item->max_loan_duration }}</td>
                                <td align="center">
                                    <a class="btn btn-warning btn-sm m-0" href="/dashboard/item/edit/{{ $item->id }}">
                                        edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>
@endsection