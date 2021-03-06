@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('admins/org/uploadify/uploadify.css')}}">
<style>
    /*缩略图*/
    .uploadify{display:inline-block;margin-bottom:0;padding-left:15px;}
    .uploadify-button{border:none; border-radius:5px;}
    span.uploadify-button-text{color: #FFF; margin:0;}
    .uploadify-queue{padding-left:15px;margin-bottom:5px;}

    /*编辑器*/
    .edui-default{line-height: 28px;}
    div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
    {overflow: hidden; height:20px;}
    div.edui-box{overflow: hidden; height:22px;}
</style>

<!--结果集标题与导航组件 开始-->
<div class="main_title">
    <h5>编辑文章</h5>
    <div class="row">
        <ul class="col-sm-12">
            <li class="left navbar-collapse"><a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加文章</a></li>
            <li class="left navbar-collapse"><a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a></li>
        </ul>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="main_content">
    <form id="ajaxForm" role="form" method="POST" action="{{url('admin/article/'.$result->id)}}">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-offset-1 col-sm-3 col-md-2">
                <div class="form-group form-group-sm">
                    <label for="cate_id"><i class="require">*</i>{{ trans('category.cate_type') }}</label>
                    <select id="cate_id" class="form-control" name="cate_id" autofocus>
                        @foreach($data as $d)
                            <option value="{{$d->id}}" @if($result->cate_id==$d->id) selected @endif >{{$d->_cate_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group form-group-sm">
                    <label for="article_title"><i class="require">*</i>{{ trans('article.article_title') }}</label>
                    <input id="article_title" type="text" class="form-control" name="article_title" value="{{$result->article_title}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-11">
                <div class="form-group form-group-sm">
                    <label for="article_content"><i class="require">*</i>{{ trans('article.article_content') }}</label>
                    <script type="text/javascript" charset="utf-8" src="{{asset('admins/org/ueditor/ueditor.config.js')}}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('admins/org/ueditor/ueditor.all.min.js')}}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('admins/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                    <script id="editor" name="article_content" type="text/plain" style="width:860px;height:500px;">{!! $result->article_content !!}</script>
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor',{
                            topOffset:40,
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="form-group form-group-sm col-sm-offset-1">
            <label for="article_thumb">{{ trans('article.article_thumb') }}</label>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-9">
                            <input id="article_thumb" type="text" class="form-control" name="article_thumb" value="{{$result->article_thumb}}">
                        </div>
                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                        <script src="{{asset('admins/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                        <script type="text/javascript">
                            <?php $timestamp = time();?>
                            $(function() {
                                $('#file_upload').uploadify({
                                    'width' : 50,
                                    'buttonText' : '上传',
                                    'formData'     : {
                                        'timestamp' : '<?php echo $timestamp;?>',
                                        '_token'     : "{{csrf_token()}}"
                                    },
                                    'swf'      : "{{asset('admins/org/uploadify/uploadify.swf')}}",
                                    'uploader' : "{{url('admin/uploadify')}}",
                                    'onUploadSuccess' : function(file, data, response) {
                                        var obj=eval("("+data+")");
                                        if (obj.status == 0){
                                            $('input[name="article_thumb"]').val(obj.result);
                                            $('#art_thumb_img').attr('src', '/' + obj.result);
                                        }else{
                                            layer.msg(obj.result, {icon: 5});
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>
                    <div class="row" {{--style="display:none;"--}}>
                        <div class="col-sm-4">
                            <div style="width:240px; border: solid 1px #999; background-color: #f0f0f0; font-size: 11px; padding: 10px;">
                                <p>1、图片大小不能超过<b>2M</b></p>
                                <p>2、支持格式：.jpg .jpeg .gif .png .bmp</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="/{{$result->article_thumb}}" alt="" id="art_thumb_img" style="margin-top:2px;max-width: 350px; max-height:100px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-4">
                <div class="form-group form-group-sm">
                    <label for="article_author">{{ trans('article.article_author') }}</label>
                    <input id="article_author" type="text" class="form-control" name="article_author" value="{{$result->article_author}}">
                </div>
                <div class="form-group form-group-sm">
                    <label for="article_keywords">{{ trans('article.article_keywords') }}</label>
                    <input id="article_keywords" type="text" class="form-control" name="article_keywords" value="{{$result->article_keywords}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-7 col-md-6">
                <div class="form-group form-group-sm">
                    <label for="article_description">{{ trans('article.article_description') }} <span style="font-size: 11px;font-weight:normal;">{{trans('article.article_desc_tip')}}</span></label>
                    <textarea id="article_description" class="form-control" name="article_description">{{$result->article_description}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-3 col-sm-2">
                <div class="form-group">
                    <button id="submit" type="submit" class="btn btn-sm btn-primary">提交</button>&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-sm btn-default" onclick="history.go(-1)">返回</button>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="has-error">
                    <label class="help-block error_tip"></label>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    initAjaxForm('ajaxForm', function(formData, jqForm, options){
        var article_description = $('textarea[name="article_description"]').val();
        if (article_description == ''){
            $('.error_tip').html('描述不能为空');
            return false;
        }
    },function (state, data) {
        if (state == true){
            if (data.status == 0){
                redirectToUrl("{{url('admin/article')}}");
            }
        }
    });
</script>
@endsection
