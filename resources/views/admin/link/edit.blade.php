@extends('layouts.admin')
@section('content')

<!--结果集标题与导航组件 开始-->
<div class="main_title">
    <h5>编辑友情链接</h5>
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
            {!! Form::model($result, ['url'=> url('admin/link/'.$result->id), 'method'=> 'post', 'id'=>'ajaxForm']) !!}
            {{method_field('PUT')}}
            <div class="form-group form-group-sm{{$errors->has('link_name')?' has-error':''}}">
                {!! Form::label('link_name', trans('link.link_name'), ['class'=> 'control-label']) !!}
                {!! Form::text('link_name', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
            </div>
            <div class="form-group form-group-sm{{$errors->has('link_url')?' has-error':''}}">
                {!! Form::label('link_url', trans('link.link_url'), ['class'=> 'control-label']) !!}
                {!! Form::url('link_url', null, ['class'=>'form-control', 'required']) !!}
            </div>
            <div class="form-group form-group-sm{{$errors->has('link_title')?' has-error':''}}">
                {!! Form::label('link_title', trans('link.link_title'), ['class'=> 'control-label']) !!}
                {!! Form::text('link_title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group form-group-sm{{$errors->has('link_order')?' has-error':''}}">
                {!! Form::label('link_order', trans('link.link_order'), ['class'=> 'control-label']) !!}
                {!! Form::number('link_order', null, ['class'=>'form-control']) !!}
                {{--{!! Form::date('name', \Carbon\Carbon::now()) !!}--}}
            </div>
            <div class="has-error">
                <label class="help-block error_tip"></label>
            </div>
            <div class="form-group">
                {!!  Form::submit('link.submit', ['id'=>'update', 'class'=> 'btn btn-sm btn-primary']) !!}
                {!!  Form::button('link.comeback', ['class'=> 'btn btn-sm btn-default', 'onclick'=>'history.go(-1)']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    initAjaxForm('ajaxForm', function(formData, jqForm, options){

    },function (state, data) {
        if (state == true){
            if (data.status == 0){
                redirectToUrl("{{url('admin/link')}}");
            }
        }
    });
</script>
@endsection
