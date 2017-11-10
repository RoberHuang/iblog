@extends('layouts.admin')
@section('content')

<!--结果集标题与配置项组件 开始-->
<div class="result_wrap">
    <h5>添加配置项</h5>
    <div class="row">
        <ul class="col-sm-12">
            <li class="left navbar-collapse"><a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加配置项</a></li>
            <li class="left navbar-collapse"><a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>全部配置项</a></li>
        </ul>
    </div>
</div>
<!--结果集标题与配置项组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/config')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>标题：</th>
                <td>
                    <input type="text" name="conf_title">
                    <span><i class="fa fa-exclamation-circle yellow"></i>配置项标题必须填写</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>名称：</th>
                <td>
                    <input type="text" name="conf_name">
                    <span><i class="fa fa-exclamation-circle yellow"></i>配置项名称必须填写</span>
                </td>
            </tr>
            <tr>
                <th>类型：</th>
                <td>
                    <input type="radio" name="field_type" value="input" checked onclick="showTr()">input　
                    <input type="radio" name="field_type" value="textarea" onclick="showTr()">textarea　
                    <input type="radio" name="field_type" value="radio" onclick="showTr()">radio
                </td>
            </tr>
            <tr class="field_value">
                <th>类型值：</th>
                <td>
                    <input type="text" class="lg" name="field_value">
                    <p><i class="fa fa-exclamation-circle yellow"></i>类型值只有在radio的情况下才需要配置，格式 1|开启,0|关闭</p>
                </td>
            </tr>
            <tr>
                <th>排序：</th>
                <td>
                    <input type="text" class="sm" name="conf_order" value="0">
                </td>
            </tr>
            <tr>
                <th>说明：</th>
                <td>
                    <textarea id="" cols="30" rows="10" name="conf_tips"></textarea>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
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
</script>
@endsection
