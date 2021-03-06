@extends('layouts.admin')
@section('content')
{{--@include('admin.public.crumb')--}}

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
        <h5>友情链接列表</h5>
        <!--快捷导航 开始-->
        <div class="row">
            <ul class="col-sm-12">
                <li class="left navbar-collapse"><a href="{{url('admin/link/create')}}"><i class="fa fa-plus"></i>添加链接</a></li>
                <li class="left navbar-collapse"><a href="{{url('admin/link')}}"><i class="fa fa-recycle"></i>全部链接</a></li>
            </ul>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="main_content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" width="4%">排序</th>
                        <th class="text-center" width="3%">ID</th>
                        <th>链接名称</th>
                        <th>链接标题</th>
                        <th>链接地址</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($data)>0)
                    @foreach($data as $v)
                    <tr>
                        <td class="text-center">
                            <input type="text" onchange="changeOrder(this, '{{$v->id}}', '{{url('admin/link/setOrder')}}')" value="{{$v->link_order}}" style="width:30px;text-align:center">
                        </td>
                        <td class="text-center">{{$v->id}}</td>
                        <td>
                            <a href="#">{{$v->link_name}}</a>
                        </td>
                        <td>{{$v->link_title}}</td>
                        <td>{{$v->link_url}}</td>
                        <td>
                            <a href="{{url('admin/link/'.$v->id.'/edit')}}">{{trans('admin/common.modify')}}</a>
                            <a href="javascript:;" onclick="del('{{url('admin/link/'.$v->id)}}')">{{trans('admin/common.delete')}}</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr><td class="text-center" colspan="6">暂无链接</td></tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

@endsection
