@extends('layouts.admin')
@section('content')

{{--<!--结果页快捷搜索框 开始-->--}}
{{--<div class="search_wrap">--}}
    {{--<form action="" method="post">--}}
        {{--<table class="search_tab">--}}
            {{--<tr>--}}
                {{--<th width="120">选择分类:</th>--}}
                {{--<td>--}}
                    {{--<select onchange="javascript:location.href=this.value;">--}}
                        {{--<option value="">全部</option>--}}
                        {{--<option value="http://www.baidu.com">百度</option>--}}
                        {{--<option value="http://www.sina.com">新浪</option>--}}
                    {{--</select>--}}
                {{--</td>--}}
                {{--<th width="70">关键字:</th>--}}
                {{--<td><input type="text" name="keywords" placeholder="关键字"></td>--}}
                {{--<td><input type="submit" name="sub" value="查询"></td>--}}
            {{--</tr>--}}
        {{--</table>--}}
    {{--</form>--}}
{{--</div>--}}
{{--<!--结果页快捷搜索框 结束-->--}}

<!--搜索结果页面 列表 开始-->
    <div class="main_title">
        <h5>{{trans('admin/config.conf_list')}}</h5>
        <!--快捷配置项 开始-->
        <div class="row">
            <ul class="col-sm-12">
                <li class="left navbar-collapse"><a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>{{trans('admin/config.conf_add')}}</a></li>
                <li class="left navbar-collapse"><a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>{{trans('admin/config.conf_list')}}</a></li>
            </ul>
        </div>
        <!--快捷配置项 结束-->
    </div>

    <div class="main_content">
        <div class="table-responsive">
            <form action="{{url('admin/config/setConf')}}" method="post" id="ajaxForm">
                {{csrf_field()}}
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="4%">{{trans('admin/common.order')}}</th>
                            <th class="text-center" width="3%">{{trans('admin/common.id')}}</th>
                            <th>{{trans('admin/common.title')}}</th>
                            <th>{{trans('admin/common.the_name')}}</th>
                            <th>{{trans('admin/common.content')}}</th>
                            <th>{{trans('admin/common.handle')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($data)>0)
                        @foreach($data as $v)
                        <tr>
                            <td class="text-center">
                                <input type="text" onchange="changeOrder(this,'{{$v->id}}','{{url('admin/config/setOrder')}}')" value="{{$v->conf_order}}" style="width:30px;text-align:center">
                            </td>
                            <td class="text-center">{{$v->id}}</td>
                            <td>
                                <a href="#">{{$v->conf_title}}</a>
                            </td>
                            <td>{{$v->conf_name}}</td>
                            <td>
                                <input type="hidden" name="conf_id[]" value="{{$v->id}}">
                                {!! $v->_html !!}
                            </td>
                            <td>
                                <a href="{{url('admin/config/'.$v->id.'/edit')}}">{{trans('admin/common.modify')}}</a>
                                <a href="javascript:;" onclick="del('{{url('admin/config/'.$v->id)}}')">{{trans('admin/common.delete')}}</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr><td class="text-center" colspan="6">{{trans('admin/common.null_content')}}</td></tr>
                        @endif
                    </tbody>
                </table>
                <div class="form-group">
                    <button id="submit" type="submit" class="btn btn-sm btn-primary">{{trans('admin/common.submit')}}</button>&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-sm btn-default" onclick="history.go(-1)">{{trans('admin/common.return')}}</button>
                </div>
            </form>
        </div>
    </div>
<!--搜索结果页面 列表 结束-->
<script>
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
