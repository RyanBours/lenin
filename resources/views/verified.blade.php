@extends('template') 
@section('title', 'Bedankt')
@push('style')
<style>
    body {
        background-image: url('/images/background.png');
        background-repeat: no-repeat;
        background-size: cover;
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
<div class="container" style="position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-leeuw text-white text-center">Bedankt</div>
                <div class="card-body">
                    <p>Bedankt voor het registreren.</p>
                </div>
                <a class="btn btn-leeuw text-white" href="/login">
                    Terug naar login
                </a>
            </div>
        </div>
    </div>
</div>

<div style="position:fixed;bottom:30;left:40;transform:rotatez(60deg) scale(8, 8)" data-toggle="tooltip" data-placement="top" title="Ha, Gotem">👌</div>
@endsection