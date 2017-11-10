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
        <h5>配置项列表</h5>
        <!--快捷配置项 开始-->
        <div class="row">
            <ul class="col-sm-12">
                <li class="left navbar-collapse"><a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加配置项</a></li>
                <li class="left navbar-collapse"><a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>全部配置项</a></li>
            </ul>
        </div>
        <!--快捷配置项 结束-->
    </div>

    <div class="main_content">
        <div class="table-responsive">
            <form action="{{url('admin/config/changecontent')}}" method="post">
                {{csrf_field()}}
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="4%">排序</th>
                            <th class="text-center" width="3%">ID</th>
                            <th>标题</th>
                            <th>名称</th>
                            <th>内容</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($data)>0)
                        @foreach($data as $v)
                        <tr>
                            <td class="text-center">
                                <input type="text" onchange="changeOrder()" value="{{$v->conf_order}}" style="width:30px;text-align:center">
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
                                <a href="{{url('admin/config/'.$v->id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="del('{{url('admin/config/'.$v->id}}')">删除</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr><td class="text-center" colspan="6">暂无内容</td></tr>
                        @endif
                    </tbody>
                </table>
                <div class="btn_group">
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回" >
                </div>
            </form>
        </div>
    </div>
<!--搜索结果页面 列表 结束-->

@endsection
