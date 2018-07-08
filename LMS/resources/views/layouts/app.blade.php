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
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <style>
        .btn-group-lg .btn, .btn-group-sm .btn {
            border-radius: 15px;
            margin: 3px;
        }
    </style>
</head>
<body>
<div id="app">
    @include('layouts.nav')
    <div class="container-fluid">
        <div class="container">
            @include('flash::message')
        </div>
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
@yield('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('article-ckeditor');
</script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
<script>
    $('#flash-overlay-modal').modal();
</script>
<script>
    $( "#end_time" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    $( "#start_time" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
</script>
</body>
</html>
