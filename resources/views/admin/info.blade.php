@extends('layouts.admin')
@section('content')

<!--结果集标题与导航组件 开始-->
<div class="main_title">
    <h5>快捷操作</h5>
    <div class="row">
        <ul class="col-sm-12">
            <li class="left navbar-collapse"><a href="#"><i class="fa fa-plus"></i>新增文章</a></li>
            <li class="left navbar-collapse"><a href="#"><i class="fa fa-recycle"></i>批量删除</a></li>
            <li class="left navbar-collapse"><a href="#"><i class="fa fa-refresh"></i>更新排序</a></li>
        </ul>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="main_title">
    <h5>系统基本信息</h5>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr><td>操作系统</td><td>{{ PHP_OS }}</td></tr>
            <tr><td>运行环境</td><td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td></tr>
            <tr><td>版本</td><td>v-1.0</td></tr>
            <tr><td>上传附件限制</td><td><?php echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?></td></tr>
            <tr><td>北京时间</td><td><?php echo date('Y年m月d日 H时i分s秒')?></td></tr>
            <tr><td>服务器域名/IP</td><td>{{$_SERVER['SERVER_NAME']}} [ {{$_SERVER['SERVER_ADDR']}} ]</td></tr>
        </table>
    </div>
</div>

<div class="main_title">
    <h5>使用帮助</h5>
    <div class="help_content">
        <ul>
            <li>
                <label>官方交流网站：</label><span><a href="#">http://bbs.iblog.cn</a></span>
            </li>
            <li>
                <label>官方交流QQ群：</label><span><a href="#"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png"></a></span>
            </li>
        </ul>
    </div>
</div>

@endsection
