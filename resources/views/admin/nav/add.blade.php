@extends('layouts.admin')
@section('content')

<!--结果集标题与导航组件 开始-->
<div class="main_title">
    <h5>添加自定义导航</h5>
    <div class="row">
        <ul class="col-sm-12">
            <li class="left navbar-collapse"><a href="{{url('admin/nav/create')}}"><i class="fa fa-plus"></i>{{trans('admin/nav.nav_add')}}</a></li>
            <li class="left navbar-collapse"><a href="{{url('admin/nav')}}"><i class="fa fa-recycle"></i>{{trans('admin/nav.nav_all')}}</a></li>
        </ul>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="main_content">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-4">
            {!! Form::open(['url'=> url('admin/nav'), 'method'=> 'post', 'id'=> 'form', 'onsubmit'=> 'return false;']) !!}
            <div class="form-group form-group-sm">
                {!! Form::label('nav_name', trans('admin/nav.nav_name'), ['class'=> 'control-label']) !!}
                {!! Form::text('nav_name', '', ['class'=>'form-control', 'autofocus', 'required']) !!}
            </div>
            <div class="form-group form-group-sm">
                {!! Form::label('nav_alias', trans('admin/nav.nav_alias'), ['class'=> 'control-label']) !!}
                {!! Form::text('nav_alias', '', ['class'=>'form-control', 'autofocus', 'required']) !!}
            </div>
            <div class="form-group form-group-sm">
                {!! Form::label('nav_url', trans('admin/nav.nav_url'), ['class'=> 'control-label']) !!}
                {!! Form::url('nav_url', 'http://', ['class'=>'form-control', 'required']) !!}
            </div>
            <div class="form-group form-group-sm{{$errors->has('link_order')?' has-error':''}}">
                {!! Form::label('nav_order', trans('admin/nav.nav_order'), ['class'=> 'control-label']) !!}
                {!! Form::number('nav_order', '0', ['class'=>'form-control']) !!}
            </div>
            <div class="has-error">
                <label class="help-block error_tip"></label>
            </div>
            <div class="form-group">
                {!!  Form::submit(trans('admin/nav.submit'), ['id'=>'submit', 'class'=> 'btn btn-sm btn-primary']) !!}
                {!!  Form::button(trans('admin/nav.comeback'), ['class'=> 'btn btn-sm btn-default', 'onclick'=>'history.go(-1)']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
