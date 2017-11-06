@extends('layouts.admin')
@section('content')
@include('admin.public.crumb')

<!--结果集标题与导航组件 开始-->
<div class="main_title">
    <h5>添加友情链接</h5>
    <div class="row">
        <ul class="col-sm-12">
            <li class="left navbar-collapse"><a href="{{url('admin/link/create')}}"><i class="fa fa-plus"></i>添加链接</a></li>
            <li class="left navbar-collapse"><a href="{{url('admin/link')}}"><i class="fa fa-recycle"></i>全部链接</a></li>
        </ul>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="main_content">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-4">
            {!! Form::open(['url'=> url('admin/link'), 'method'=> 'post', 'onsubmit'=>'return false', 'id'=>'form']) !!}
            <div class="form-group form-group-sm{{$errors->has('link_name')?' has-error':''}}">
                {!! Form::label('link_name', trans('link.link_name'), ['class'=> 'control-label']) !!}
                {!! Form::text('link_name', '', ['class'=>'form-control', 'autofocus', 'required']) !!}
            </div>
            <div class="form-group form-group-sm{{$errors->has('link_url')?' has-error':''}}">
                {!! Form::label('link_url', trans('link.link_url'), ['class'=> 'control-label']) !!}
                {!! Form::url('link_url', 'http://', ['class'=>'form-control', 'required']) !!}
            </div>
            <div class="form-group form-group-sm{{$errors->has('link_title')?' has-error':''}}">
                {!! Form::label('link_title', trans('link.link_title'), ['class'=> 'control-label']) !!}
                {!! Form::text('link_title', '', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group form-group-sm{{$errors->has('link_order')?' has-error':''}}">
                {!! Form::label('link_order', trans('link.link_order'), ['class'=> 'control-label']) !!}
                {!! Form::number('link_order', '0', ['class'=>'form-control']) !!}
                {{--{!! Form::date('name', \Carbon\Carbon::now()) !!}--}}
            </div>
            <div class="has-error">
                <label class="help-block error_tip"></label>
            </div>
            <div class="form-group">
                {!!  Form::submit('link.submit', ['id'=>'submit', 'class'=> 'btn btn-sm btn-primary']) !!}
                {!!  Form::button('link.comeback', ['class'=> 'btn btn-sm btn-default', 'onclick'=>'history.go(-1)']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
