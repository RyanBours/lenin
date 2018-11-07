@extends('template')
@push('style')
<style>
	body {
		background-image: url('/images/background.png');
		background-repeat: no-repeat;
		background-size: cover;
	}
	
</style>
@endpush
@section('content')
<div class="container" style="position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifieer uw e-mail address.') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Er is een nieuwe link naar uw e-mail adress gestuurd.') }}
                        </div>
                    @endif

                    {{ __('Voordat we doorgaan, volg de verificatie link die u toegestuurd hebt gekregen.') }}
                    {{ __('Als u geen link hebt gekregen') }}, <a href="{{ route('verification.resend') }}">{{ __('klik hier om het opnieuw te sturen') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-leeuw" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    terug naar login
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection
