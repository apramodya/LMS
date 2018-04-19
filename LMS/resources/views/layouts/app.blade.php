<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        .btn-group-lg .btn, .btn-group-sm .btn {
            border-radius: 15px;
            margin: 3px;
        }
        #myContainer{
            margin-top: 25px; margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div id="app">
    @include('layouts.nav')
    <div id="myContainer">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
@yield('scripts')
bjhbvkj
b jknb jl
n n
nmmmmmmm
mmmmmmmmmmmmmmmmmmmmmmmmmm
mmmmmmmmmmmmmm

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

</body>
</html>
