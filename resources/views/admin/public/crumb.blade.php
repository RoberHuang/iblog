
<!--面包屑导航 开始-->
<div class="crumb_warp crumb-fixed-top">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="{{url('admin/'.$path['module'])}}">{{trans('admin/module.'.$path['module'])}}</a> &raquo; {{trans('admin/module.'.$path['action'])}}
</div>
<!--面包屑导航 结束-->

<div class="h_40"></div>