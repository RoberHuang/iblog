@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp crumb-fixed-top">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章管理
    </div>
    <!--面包屑导航 结束-->
    <div class="h_40"></div>
    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
    <div class="main_title">
        <!--快捷导航 开始-->
        <h5>文章列表</h5>
        <div class="row">
            <ul class="col-sm-12">
                <li class="left navbar-collapse"><a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加文章</a></li>
                <li class="left navbar-collapse"><a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a></li>
            </ul>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="main_content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" width="3%">ID</th>
                        <th>标题</th>
                        <th>点击</th>
                        <th>编辑</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($data)>0)
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v->id}}</td>
                        <td>
                            <a href="#">{{$v->article_title}}</a>
                        </td>
                        <td>{{$v->article_frequency}}</td>
                        <td>{{$v->article_author}}</td>
                        <td>{{$v->publish_at}}</td>
                        <td>
                            <a href="{{url('admin/article/'.$v->id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="delArt({{$v->id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr><td class="text-center" colspan="6">暂无文章</td></tr>
                @endif
                </tbody>
            </table>

            <div class="page_list">
                {{--{{$data->links()}}--}}
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

<style>
    .result_content ul li span {
        font-size: 15px;
        padding: 6px 12px;
    }
</style>

<script>
    //删除分类
    function delArt(art_id) {
        layer.confirm('您确定要删除这篇文章吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/article/')}}/"+art_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
//            layer.msg('的确很重要', {icon: 1});
        }, function(){

        });
    }
</script>

@endsection
