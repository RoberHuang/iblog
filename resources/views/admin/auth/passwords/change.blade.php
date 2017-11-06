@extends('layouts.admin')
@section('content')

<!--结果集标题与导航组件 开始-->
<div class="main_title">
    <h5>{{ trans('index.change_pwd') }}
        <small></small>
    </h5>
</div>
<!--结果集标题与导航组件 结束-->

<div class="h_20"></div>

<div class="main_content">
<div class="row">
    <div class="col-sm-4 col-lg-3 col-sm-offset-2">
        @if ($errors->has('errormsg'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                {{ $errors->first('errormsg') }}
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form class="form-horizontal" role="form" method="POST" action="">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('password_o') ? ' has-error' : '' }}">
                <label for="password_o" class="col-sm-2 control-label">{{ trans('validation.attributes.password_o') }}</label>
                <div class="col-sm-4 col-lg-3"><input id="password_o" type="password" class="form-control" name="password_o" value="{{old('password_o')}}" required autofocus></div>
                <div class="col-sm-6 col-lg-7">
                    {{--<div class="alert alert-default alert-dismissable" style="margin-bottom:0;padding:6px 35px 6px 15px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            &times;
                        </button>
                        {{ $errors->first('password_o') }}
                    </div>--}}
                    <span class="help-block">{{ $errors->first('password_o') }}</span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-sm-2 control-label">{{ trans('validation.attributes.password') }}</label>
                <div class="col-sm-4 col-lg-3"><input id="password" type="password" class="form-control" name="password" required autofocus></div>
                <div class="col-sm-6 col-lg-7">
                    <span class="help-block">{{ $errors->first('password') }}</span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password_confirmation" class="col-sm-2 control-label">{{ trans('validation.attributes.password_o') }}</label>
                <div class="col-sm-4 col-lg-3"><input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autofocus></div>
                <div class="col-sm-6 col-lg-7">
                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        提交
                    </button>
                    <button type="button" class="btn btn-default" onclick="history.go(-1)">
                        返回
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection