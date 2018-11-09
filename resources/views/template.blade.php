<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <title>@yield('title')</title>
        @stack('style')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @yield('content')
        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('script')        
    </body>
</html>
