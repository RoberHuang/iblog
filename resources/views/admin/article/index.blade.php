@extends('layouts.admin')
@section('content')
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
                        <th>文章分类</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($data)>0)
                    @foreach($data as $v)
                    <tr>
                        <td class="text-center">{{$v->id}}</td>
                        <td>
                            <a href="#">{{$v->article_title}}</a>
                        </td>
                        <td>{{$v->article_frequency}}</td>
                        <td>{{$v->article_author}}</td>
                        <td>@if(isset($v->category->cate_name)){{$v->category->cate_name}}@else 未分类@endif</td>
                        <td>{{$v->published_at}}</td>
                        <td>
                            <a href="{{url('admin/article/'.$v->id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="delArticle({{$v->id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr><td class="text-center" colspan="6">暂无文章</td></tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="">
            {{--{{$data->render()}}--}}
            {{$data->links()}}
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

<script>
    //删除分类
    function delArticle(article_id) {
        layer.confirm('您确定要删除这篇文章吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/article/')}}/"+article_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==0){
                    layer.msg(data.result, {icon: 6});
                    window.setTimeout(function(){
                        location.href = location.href;
                    },3000);
                }else{
                    layer.msg(data.result, {icon: 5});
                }
            });
        }, function(){

        });
    }
</script>

@endsection
