<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admins/style/css/is-style.admin.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/style/css/is-main.admin.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/style/css/is-left.admin.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/style/font/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admins/style/css/is-layout.admin.css') }}">

    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('admins/style/js/is-main.admin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/org/layer/layer.js') }}"></script>
</body>
</html>
