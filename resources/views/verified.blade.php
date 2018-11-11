@extends('template') 
@section('title', 'Bedankt')
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

@push('script')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endpush

@section('content')
<img class="marginauto img-fluid" src="../images/LogoLeeuw.png" alt="Leeuwenborgh logo" width="300" height="300">
<div class="container" style="position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-leeuw text-white text-center">Bedankt</div>
                <div class="card-body">
                    <p>Bedankt voor het registreren.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="position:fixed;bottom:30;left:40;transform:rotatez(60deg) scale(8, 8)" data-toggle="tooltip" data-placement="top" title="Ha, Gotem">👌</div>
@endsection