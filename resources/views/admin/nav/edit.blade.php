@extends('layouts.admin')
@section('content')

<!--结果集标题与导航组件 开始-->
<div class="main_title">
    <h5>编辑自定义导航</h5>
    <div class="row">
        <ul class="col-sm-12">
            <li class="left navbar-collapse"><a href="{{url('admin/navs/create')}}"><i class="fa fa-plus"></i>{{trans('admin/nav.nav_add')}}</a></li>
            <li class="left navbar-collapse"><a href="{{url('admin/navs')}}"><i class="fa fa-recycle"></i>{{trans('admin/nav.nav_all')}}</a></li>
        </ul>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="main_content">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-4">
            {!! Form::model($result, ['url'=> url('admin/nav/'.$result->id), 'method'=> 'post', 'id'=> 'form', 'onsubmit'=> 'return false;']) !!}
            {{method_field('PUT')}}
            <div class="form-group form-group-sm">
                {!! Form::label('nav_name', trans('admin/nav.nav_name'), ['class'=> 'control-label']) !!}
                {!! Form::text('nav_name', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
            </div>
            <div class="form-group form-group-sm">
                {!! Form::label('nav_alias', trans('admin/nav.nav_alias'), ['class'=> 'control-label']) !!}
                {!! Form::text('nav_alias', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
            </div>
            <div class="form-group form-group-sm">
                {!! Form::label('nav_url', trans('admin/nav.nav_url'), ['class'=> 'control-label']) !!}
                {!! Form::url('nav_url', null, ['class'=>'form-control', 'required']) !!}
            </div>
            <div class="form-group form-group-sm{{$errors->has('link_order')?' has-error':''}}">
                {!! Form::label('nav_order', trans('admin/nav.nav_order'), ['class'=> 'control-label']) !!}
                {!! Form::number('nav_order', null, ['class'=>'form-control']) !!}
            </div>
            <div class="has-error">
                <label class="help-block error_tip"></label>
            </div>
            <div class="form-group">
                {!!  Form::submit(trans('admin/nav.submit'), ['id'=>'update', 'class'=> 'btn btn-sm btn-primary']) !!}
                {!!  Form::button(trans('admin/nav.comeback'), ['class'=> 'btn btn-sm btn-default', 'onclick'=>'history.go(-1)']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#update').click(function () {
            $.ajax({
                url: "{{ url('admin/nav/'.$result->id) }}",
                data: $('#form').serialize(),
                type: 'POST',
                dataType: 'json',
                success: function(data){
                    if (data.status == 0){
                        layer.msg(data.result, {icon: 6});
                        window.setTimeout(function () {
                            document.location = "{{ url('admin/nav') }}"
                        }, 3000);
                    }else{
                        $('.error_tip').html(data.result);
                    }
                },
                error: function (er) {

                }
            });
        });
    });
</script>
@endsection
