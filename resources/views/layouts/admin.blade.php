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
    <link rel="stylesheet" href="{{ asset('admins/style/font/css/font-awesome.min.css') }}">

    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('admins/style/js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('admins/style/js/jquery.form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/style/js/is-main.admin.js') }}"></script>
</head>
<body>
    <div id="app">
        <!--面包屑导航 开始-->
        <div class="crumb_warp crumb-fixed-top">
            <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
            <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">{{ trans('admin/module.app_admin') }}</a> &raquo; @if(isset($path['module']))<a href="{{url('admin/'.$path['module'])}}">{{trans('admin/module.'.$path['module'])}}</a> &raquo; @endif{{trans('admin/module.'.$path['action'])}}
        </div>
        <!--面包屑导航 结束-->
        <div class="h_40"></div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('admins/org/layer/layer.js') }}"></script>
    <script type="text/javascript">
        var URL = "{{Request::path()}}";
        var URL1 = "{{Request::getPathInfo()}}";
        var CONFIRM_DEL = "{{trans('admin/common.confirm_del')}}";
        var SURE = "{{trans('admin/common.sure')}}";
        var CANCEL = "{{trans('admin/common.cancel')}}";
    </script>
</body>
</html>
