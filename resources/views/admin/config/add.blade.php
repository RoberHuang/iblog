@extends('layouts.admin')
@section('content')

<!--结果集标题与配置项组件 开始-->
<div class="main_title">
    <h5>{{trans('admin/config.conf_add')}}</h5>
    <div class="row">
        <ul class="col-sm-12">
            <li class="left navbar-collapse"><a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>{{trans('admin/config.conf_add')}}</a></li>
            <li class="left navbar-collapse"><a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>{{trans('admin/config.conf_all')}}</a></li>
        </ul>
    </div>
</div>
<!--结果集标题与配置项组件 结束-->

<div class="main_content">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-4">
            {!! Form::open(['url'=> url('admin/config'), 'method'=> 'post', 'id'=> 'ajaxForm']) !!}
            <div class="form-group form-group-sm">
                {!! Form::label('conf_title', trans('admin/common.title'), ['class'=> 'control-label']) !!}
                {!! Form::text('conf_title', '', ['class'=>'form-control', 'autofocus', 'required']) !!}
            </div>
            <div class="form-group form-group-sm">
                {!! Form::label('conf_name', trans('admin/common.the_name'), ['class'=> 'control-label']) !!}
                {!! Form::text('conf_name', '', ['class'=>'form-control', 'required']) !!}
            </div>
            <div class="form-group form-group-sm">
                {!! Form::label('field_type', trans('admin/common.type'), ['class'=> 'control-label']) !!}
                <div style="display: block;width:100%;">
                <div class="radio-inline">
                {!! Form::radio('field_type', 'input', true, ['onclick'=> "showTr()"]) !!}input　
                </div>
                <div class="radio-inline">
                {!! Form::radio('field_type', 'textarea', false, ['onclick'=> "showTr()"]) !!}textarea　
                </div>
                <div class="radio-inline">
                {!! Form::radio('field_type', 'radio', false, ['onclick'=> "showTr()"]) !!}radio
                </div>
                </div>
            </div>
            <div class="form-group form-group-sm field_value">
                {!! Form::label('field_value', trans('admin/config.type_value'), ['class'=> 'control-label']) !!}
                {!! Form::text('field_value', '', ['class'=>'form-control']) !!}
                <p><i class="fa fa-exclamation-circle yellow"></i>{{trans('admin/config.field_val_tip')}}</p>
            </div>
            <div class="form-group form-group-sm">
                {!! Form::label('conf_order', trans('admin/common.order'), ['class'=> 'control-label']) !!}
                {!! Form::number('conf_order', '0', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group form-group-sm">
                {!! Form::label('conf_remark', trans('admin/config.remark'), ['class'=> 'control-label']) !!}
                {!! Form::textarea('conf_remark', '', ['class'=>'form-control', 'cols'=> 30, 'rows'=>5]) !!}
            </div>
            <div class="form-group">
                {!!  Form::submit(trans('admin/common.submit'), ['id'=>'submit', 'class'=> 'btn btn-sm btn-primary']) !!}
                {!!  Form::button(trans('admin/common.return'), ['class'=> 'btn btn-sm btn-default', 'onclick'=>'history.go(-1)']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    showTr();
    function showTr() {
        var type = $('input[name=field_type]:checked').val();
        if(type=='radio'){
            $('.field_value').show();
        }else{
            $('.field_value').hide();
        }
    }

    initAjaxForm('ajaxForm', function(formData, jqForm, options){

    },function (state, data) {
        if (state == true){
            if (data.status == 0){
                redirectToUrl("{{url('admin/config')}}");
            }
        }
    });
</script>
@endsection
