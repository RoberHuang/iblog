@extends('layouts.admin')
@section('content')

<!--结果集标题与导航组件 开始-->
<div class="main_title">
    <h5>{{trans('admin/category.cate_add')}}</h5>
    <!--快捷导航 开始-->
    <div class="row">
        <ul class="col-sm-12">
            <li class="left navbar-collapse"><a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>{{trans('admin/category.cate_add')}}</a></li>
            <li class="left navbar-collapse"><a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>{{trans('admin/category.cate_all')}}</a></li>
        </ul>
    </div>
    <!--快捷导航 结束-->
</div>
<!--结果集标题与导航组件 结束-->

<div class="main_content">
    {{--<div class="row">
        <div class="col-sm-4 col-sm-offset-2">
            @if ($errors->has('errormsg'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                    {{$errors->first('errormsg')}}
                </div>
            @endif
        </div>
    </div>--}}
    <form id="ajaxForm" class="form-horizontal" role="form" method="POST" action="{{url('admin/category')}}">
        {{csrf_field()}}
        <div class="form-group form-group-sm">
            <label for="cate_pid" class="col-sm-2 control-label"><i class="require">*</i>{{ trans('admin/category.pid_type') }}</label>
            <div class="col-sm-4 col-lg-3">
                <select class="form-control" name="cate_pid" autofocus>
                    <option value="0">=={{trans('admin/category.top_type')}}==</option>
                    @foreach($data as $d)
                    <option value="{{$d->id}}">{{$d->cate_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 col-lg-7">
                <span class="cate_pid error"></span>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="cate_name" class="col-sm-2 control-label"><i class="require">*</i>{{ trans('admin/category.cate_name') }}</label>
            <div class="col-sm-4 col-lg-3"><input type="text" class="form-control" name="cate_name" required></div>
            <div class="col-sm-6 col-lg-7">
                <span class="cate_name error"></span>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="cate_title" class="col-sm-2 control-label">{{ trans('admin/category.cate_title') }}</label>
            <div class="col-sm-4 col-lg-3"><input type="text" class="form-control" name="cate_title"></div>
            <div class="col-sm-6 col-lg-7">
                <span class="cate_title error"></span>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="cate_keywords" class="col-sm-2 control-label">{{ trans('admin/category.cate_keywords') }}</label>
            <div class="col-sm-4 col-lg-3"><textarea class="form-control" name="cate_keywords"></textarea></div>
            <div class="col-sm-6 col-lg-7">
                <span class="cate_keywords error"></span>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="cate_description" class="col-sm-2 control-label">{{ trans('admin/category.cate_description') }}</label>
            <div class="col-sm-4 col-lg-3"><textarea class="form-control" name="cate_description"></textarea></div>
            <div class="col-sm-6 col-lg-7">
                <span class="cate_description error"></span>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="cate_order" class="col-sm-2 control-label"><i class="require">*</i>{{ trans('admin/category.cate_order') }}</label>
            <div class="col-sm-4 col-lg-3"><input type="text" class="form-control" name="cate_order" required></div>
            <div class="col-sm-6 col-lg-7">
                <span class="cate_order error"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-sm btn-primary">{{trans('admin/common.submit')}}</button>
                <button type="button" class="btn btn-sm btn-default" onclick="history.go(-1)">{{trans('admin/common.return')}}</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    initAjaxForm('ajaxForm', function(formData, jqForm, options){
        var cate_title = $('input[name="cate_title"]').val();
        if (cate_title == ''){
            $('.cate_title').html('标题不能为空');
            return false;
        }
    },function (state, data) {
        if (state == true){
            if (data.status == 0){
                redirectToUrl("{{url('admin/category')}}");
            }
        }
    });

</script>
@endsection
