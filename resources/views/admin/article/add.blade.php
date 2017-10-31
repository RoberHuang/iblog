@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('admins/org/uploadify/uploadify.css')}}">
    <style>
        /*缩略图*/
        .uploadify{display:inline-block;}
        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}

        /*编辑器*/
        .edui-default{line-height: 28px;}
        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
        {overflow: hidden; height:20px;}
        div.edui-box{overflow: hidden; height:22px;}
    </style>
    <!--面包屑导航 开始-->
    <div class="crumb_warp crumb-fixed-top">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章管理
    </div>
    <!--面包屑导航 结束-->

    <div class="h_40"></div>

    <!--结果集标题与导航组件 开始-->
    <div class="main_title">
        <h5>添加文章</h5>
        <div class="row">
            <ul class="col-sm-12 navbar-nav">
                <li class="left navbar-collapse"><a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加文章</a></li>
                <li class="left navbar-collapse"><a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a></li>
            </ul>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="main_content">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                @if ($errors->has('errormsg'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            &times;
                        </button>
                        {{$errors->first('errormsg')}}
                    </div>
                @endif
            </div>
        </div>

        <form role="form" method="POST" action="{{url('admin/article')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-offset-1 col-sm-4">
                    <div class="form-group form-group-sm{{$errors->has('cate_type')?' has-error':''}}">
                        <label for="cate_id">{{ trans('category.cate_type') }}</label>
                        <select id="cate_id" class="form-control" name="cate_id" autofocus>
                            @foreach($data as $d)
                                <option value="{{$d->id}}">{{$d->_cate_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cate_type'))
                            <p class="help-block">{{ $errors->first('cate_type') }}</p>
                        @endif
                    </div>
                    <div class="form-group form-group-sm{{ $errors->has('article_title') ? ' has-error' : '' }}">
                        <label for="article_title"><i class="require">*</i>{{ trans('article.article_title') }}</label>
                        <input id="article_title" type="text" class="form-control" name="article_title" required>
                        @if ($errors->has('article_title'))
                            <p class="help-block">{{ $errors->first('article_title') }}</p>
                        @endif
                    </div>
                    <div class="form-group form-group-sm{{ $errors->has('article_author') ? ' has-error' : '' }}">
                        <label for="article_author">{{ trans('article.article_author') }}</label>
                        <input id="article_author" type="text" class="form-control" name="article_author">
                        @if ($errors->has('article_author'))
                            <p class="help-block">{{ $errors->first('article_author') }}</p>
                        @endif
                    </div>
                    <div class="form-group form-group-sm{{ $errors->has('article_thumb') ? ' has-error' : '' }}">
                        <label for="article_thumb">{{ trans('article.article_thumb') }}</label>
                        <div class="row">
                            <div class="col-xs-9">
                                <input id="article_thumb" type="text" class="form-control" name="article_thumb">
                            </div>
                            <div class="col-xs-3">
                                <input id="file_upload" name="file_upload" type="file" multiple="true">
                            </div>
                        </div>
                        @if ($errors->has('article_thumb'))
                            <p class="help-block">{{ $errors->first('article_thumb') }}</p>
                        @endif
                    </div>
                    <div class="form-group form-group-sm{{ $errors->has('article_keywords') ? ' has-error' : '' }}">
                        <label for="article_keywords">{{ trans('article.article_keywords') }}</label>
                        <input id="article_keywords" type="text" class="form-control" name="article_keywords">
                        @if ($errors->has('article_keywords'))
                            <p class="help-block">{{ $errors->first('article_keywords') }}</p>
                        @endif
                    </div>
                    <div class="form-group form-group-sm{{ $errors->has('article_description') ? ' has-error' : '' }}">
                        <label for="article_description">{{ trans('article.article_description') }}</label>
                        <textarea id="article_description" class="form-control" name="article_description"></textarea>
                        @if ($errors->has('article_description'))
                            <p class="help-block">{{ $errors->first('article_description') }}</p>
                        @endif
                    </div>
                    <div class="form-group form-group-sm{{ $errors->has('article_content') ? ' has-error' : '' }}">
                        <label for="article_content" class="control-label"><i class="require">*</i>{{ trans('article.article_content') }}</label>
                        @if ($errors->has('article_content'))
                            <p class="help-block">{{ $errors->first('article_content') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-1 col-sm-11">
                    <script type="text/javascript" charset="utf-8" src="{{asset('admins/org/ueditor/ueditor.config.js')}}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('admins/org/ueditor/ueditor.all.min.js')}}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('admins/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                    <script id="editor" name="article_content" type="text/plain" style="width:860px;height:500px;"></script>
                    <script type="text/javascript">
                    var ue = UE.getEditor('editor');
                    </script>
                </div>
            </div>
            <div class="h_40"></div>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">提交</button>
                        <button type="button" class="btn btn-sm btn-default" onclick="history.go(-1)">返回</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    {{--缩略图--}}
    <script src="{{asset('admins/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        <?php $timestamp = time();?>
        $(function() {
            $('#file_upload').uploadify({
                'buttonText' : '图片上传',
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    '_token'     : "{{csrf_token()}}"
                },
                'swf'      : "{{asset('admins/org/uploadify/uploadify.swf')}}",
                'uploader' : "{{url('admin/upload')}}",
                'onUploadSuccess' : function(file, data, response) {
                    $('input[name=art_thumb]').val(data);
                    $('#art_thumb_img').attr('src','/'+data);
//                                    alert(data);
                }
            });
        });
    </script>

    {{--编辑器--}}

@endsection
