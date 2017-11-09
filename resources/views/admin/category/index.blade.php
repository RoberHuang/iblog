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
<form action="#" method="post">
    <div class="main_title">
        <h5>{{trans('admin/category.cate_list')}}</h5>
        <!--快捷导航 开始-->
        <div class="row">
            <ul class="col-sm-12">
                <li class="left navbar-collapse"><a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>{{trans('admin/category.cate_add')}}</a></li>
                <li class="left navbar-collapse"><a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>{{trans('admin/category.cate_all')}}</a></li>
            </ul>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="main_content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" width="4%">{{trans('admin/common.order')}}</th>
                        <th class="text-center" width="3%">{{trans('admin/common.id')}}</th>
                        <th>{{trans('admin/category.cate_name')}}</th>
                        <th>{{trans('admin/common.title')}}</th>
                        <th>{{trans('admin/common.frequency')}}</th>
                        <th>{{trans('admin/common.handle')}}</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($data)>0)
                    @foreach($data as $v)
                    <tr>
                        <td class="text-center">
                            <input type="text" onchange="changeOrder(this,'{{$v->id}}','{{url('admin/cate/setOrder')}}')" value="{{$v->cate_order}}" style="width:30px;text-align:center">
                        </td>
                        <td class="text-center">{{$v->id}}</td>
                        <td>
                            <a href="#">{{$v->_cate_name}}</a>
                        </td>
                        <td>{{$v->cate_title}}</td>
                        <td>{{$v->cate_frequency}}</td>
                        <td>
                            <a href="{{url('admin/category/'.$v->id.'/edit')}}">{{trans('admin/common.modify')}}</a>
                            <a href="javascript:;" onclick="del('{{url('admin/category/'.$v->id)}}')">{{trans('admin/common.delete')}}</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr><td class="text-center" colspan="6">{{trans('admin/common.null_content')}}</td></tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
@endsection
