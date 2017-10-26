@extends('layouts.admin_login')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                <a href="{{ url('/') }}">{{ trans('login.app_home') }}</a>
    {{--
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{ trans('login.select_lang') }}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="#">功能</a>
                    </li>
                    <li>
                        <a href="#">另一个功能</a>
                    </li>

                </ul>
    --}}
                <a href="{{ route('login') }}" class="dropdown dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ trans('login.select_lang') }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu pull-right" role="menu">
                    @foreach(Config::get('app.locales') as $l => $lang)
                        {{--@if($l != App::getLocale())--}}
                            <li><a href="{{ route('admin.lang', $l) }}">{{ trans('login.'.$lang) }}</a></li>
                        {{--@endif--}}
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-center">
                            {{--<img src="{{URL::asset('/images/logo.png')}}" class="img-rounded" alt="Cinque Terre" width="136" height="56">--}}
                            <h3>{{--Sign in to Iris English--}}Admin Login</h3>
                        </div>
                    </div>

                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('admin.login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">{{ trans('validation.attributes.username') }}</label>

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">{{ trans('validation.attributes.password') }}</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{--<div class="form-group">
                                <div class="col-md-offset-1">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ trans('login.login') }}
                                </button>
                            </div>
                            <div class="text-right">
                                <a class="btn-link" href="{{ route('admin.password.request') }}">
                                    {{ trans('login.forgot_pwd') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body text-center">
                            @ 2017 Powered by iris
                    </div>
                </div>

                <div class="content">
                    <div class="links">
                        <a href="https://laravel.com/docs">Documentation</a>
                        <a href="https://laravel-news.com">News</a>
                        <a href="https://forge.laravel.com">Forge</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
