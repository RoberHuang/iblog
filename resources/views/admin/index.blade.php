@extends('layouts.admin')

@section('content')
    <!--顶部导航 开始-->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="col-sm-12">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    {{--{{ config('app.name', 'Laravel') }}--}}{{ trans('index.app_admin') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}" target="_blank" class="active">{{ trans('index.app_home') }}</a></li>
                    <li><a href="{{ url('admin/info') }}" target="main">{{ trans('index.manage') }}</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (auth()->guard('admin')->guest())
                        <li><a href="{{ route('admin.login') }}">Login</a></li>
                    @else
                        <li><a href="{{ url('admin/password/change') }}" target="main">{{ trans('index.modify_pwd') }}</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ auth()->guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ trans('index.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!--顶部导航 结束-->

    <!--左侧导航 开始-->
    <div class="menu_box">
        <ul>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>{{ trans('index.cont_manage') }}</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/category/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>{{ trans('index.add_types') }}</a></li>
                    <li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>{{ trans('index.type_list') }}</a></li>
                    <li><a href="{{url('admin/article/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>{{ trans('index.add_articles') }}</a></li>
                    <li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>{{ trans('index.article_list') }}</a></li>
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-cog"></i>{{ trans('index.sys_set') }}</h3>
                <ul class="sub_menu" style="display: block;">
                    <li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>{{ trans('index.links') }}</a></li>
                    <li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-navicon"></i>{{ trans('index.my_nav') }}</a></li>
                    <li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-cogs"></i>{{ trans('index.site_set') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--左侧导航 结束-->

    <!--主体部分 开始-->
    <div class="main_box">

        {{--<div style="position:fixed;left:190px;right:0;top:90px;bottom:35px">--}}
            <iframe src="{{ url('admin/info') }}" frameborder="0" width="100%" height="100%" name="main"></iframe>
        {{--</div>--}}
    </div>
    <!--主体部分 结束-->

    <!--底部 开始-->
    <div class="bottom_box">
        CopyRight © 2015. Powered By <a href="{{ config('app.url', 'http://iblog.cn') }}">{{ config('app.url', 'http://iblog.cn') }}</a>.
    </div>
    <!--底部 结束-->


{{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
