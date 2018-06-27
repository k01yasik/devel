<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{url('css/app.css')}}" rel="stylesheet">
    @yield('styles')


</head>
<body>
<div class="my-row">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif
</div>
<div class="my-row header-row">
    <div class="my-row-wrapper">
        @include('includes.header')
    </div>
</div>
<div class="my-row vertical-height">
    <div class="my-row-wrapper vertical-height">
        <div class="main">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{url('js/app.js')}}"></script>
</body>
</html>