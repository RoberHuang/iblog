@extends('layouts.admin')
@section('content')
<!--面包屑导航 开始-->
<div class="crumb_warp crumb-fixed-top">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 分类管理
</div>
<!--面包屑导航 结束-->

<div class="h_40"></div>

<!--结果集标题与导航组件 开始-->
<div class="main_title">
    <h5>添加分类</h5>
    <!--快捷导航 开始-->
    <div class="row">
        <ul class="col-sm-12 navbar-nav">
            <li class="left navbar-collapse"><a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>添加分类</a></li>
            <li class="left navbar-collapse"><a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>全部分类</a></li>
        </ul>
    </div>
    <!--快捷导航 结束-->
</div>
<!--结果集标题与导航组件 结束-->

<div class="main_content">
    <div class="row">
        <div class="col-sm-4 col-md-offset-2">
            @if ($errors->has('errormsg'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                    {{$errors->first('errormsg')}}
                </div>
            @endif
        </div>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{url('admin/category')}}">
        {{csrf_field()}}
        <div class="form-group form-group-sm{{$errors->has('cate_pid')?' has-error':''}}">
            <label for="cate_pid" class="col-sm-2 control-label"><i class="require">*</i>{{ trans('category.pid_type') }}</label>
            <div class="col-sm-4 col-lg-3">
                <select id="cate_pid" class="form-control" name="cate_pid" autofocus>
                    <option value="0">==顶级分类==</option>
                    @foreach($data as $d)
                    <option value="{{$d->id}}">{{$d->cate_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 col-lg-7">
                @if ($errors->has('cate_pid'))
                    <p class="help-block">{{ $errors->first('cate_pid') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group form-group-sm{{ $errors->has('cate_name') ? ' has-error' : '' }}">
            <label for="cate_name" class="col-sm-2 control-label"><i class="require">*</i>{{ trans('category.cate_name') }}</label>
            <div class="col-sm-4 col-lg-3"><input id="cate_name" type="text" class="form-control" name="cate_name" required></div>
            <div class="col-sm-6 col-lg-7">
                @if ($errors->has('cate_name'))
                    <p class="help-block">{{ $errors->first('cate_name') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group form-group-sm{{ $errors->has('cate_title') ? ' has-error' : '' }}">
            <label for="cate_title" class="col-sm-2 control-label">{{ trans('category.cate_title') }}</label>
            <div class="col-sm-4 col-lg-3"><input id="cate_title" type="text" class="form-control" name="cate_title"></div>
            <div class="col-sm-6 col-lg-7">
                @if ($errors->has('cate_title'))
                    <p class="help-block">{{ $errors->first('cate_title') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group form-group-sm{{ $errors->has('cate_keywords') ? ' has-error' : '' }}">
            <label for="cate_keywords" class="col-sm-2 control-label">{{ trans('category.cate_keywords') }}</label>
            <div class="col-sm-4 col-lg-3"><textarea id="cate_keywords" class="form-control" name="cate_keywords"></textarea></div>
            <div class="col-sm-6 col-lg-7">
                @if ($errors->has('cate_keywords'))
                    <p class="help-block">{{ $errors->first('cate_keywords') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group form-group-sm{{ $errors->has('cate_description') ? ' has-error' : '' }}">
            <label for="cate_description" class="col-sm-2 control-label">{{ trans('category.cate_description') }}</label>
            <div class="col-sm-4 col-lg-3"><textarea id="cate_description" class="form-control" name="cate_description"></textarea></div>
            <div class="col-sm-6 col-lg-7">
                @if ($errors->has('cate_description'))
                    <p class="help-block">{{ $errors->first('cate_description') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group form-group-sm{{ $errors->has('cate_order') ? ' has-error' : '' }}">
            <label for="cate_order" class="col-sm-2 control-label"><i class="require">*</i>{{ trans('category.cate_order') }}</label>
            <div class="col-sm-4 col-lg-3"><input id="cate_order" type="text" class="form-control" name="cate_order" required></div>
            <div class="col-sm-6 col-lg-7">
                @if ($errors->has('cate_order'))
                    <p class="help-block">{{ $errors->first('cate_order') }}</p>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-sm btn-primary">提交</button>
                <button type="button" class="btn btn-sm btn-default" onclick="history.go(-1)">返回</button>
            </div>
        </div>
    </form>
</div>

@endsection
