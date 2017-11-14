//添加
/*$(function () {
    $('#submit').click(function () {
        var url = ($('#form').attr('action'));
        $.ajax({
            url: url,
            data: $('#form').serialize(),
            type: 'POST',
            dataType: 'json',
            success: function(data){
                if (data.status == 0){
                    layer.msg(data.result, {icon: 6});
                    window.setTimeout(function () {
                        document.location = url
                    }, 3000);
                }else{
                    $('.error_tip').html(data.result);
                }
            },
            error: function (er) {

            }
        });
    });
});*/

/**
 * 排序
 * @param obj    当前对象
 * @param id    当前对象id
 * @param url    提交地址
 */
function changeOrder(obj, id, url){
    var token = $('meta[name="csrf-token"]').attr('content');
    var order = $(obj).val();
    $.post(url, {'_token': token, 'id': id, 'order': order}, function(data){
        if(data.status == 1){
            refresh();
        }
    });
}

/**
 * 删除
 * @param url    提交地址
 */
function del(url) {
    layer.confirm(CONFIRM_DEL, {
        btn: [SURE, CANCEL]
    }, function(){
        layer.closeAll('dialog');   //关闭信息框
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(url, {'_method': 'delete','_token': token},function (data) {
            if(data.status==0){
                refresh();
            }
        });
    }, function(){

    });
}

/**
 * 刷新页面
 * @param msec    定时器时间
 */
function refresh(msec)
{
    msec = msec || 3000;
    window.setTimeout(function(){
        document.location.reload();
    }, msec);
}

/**
 * 重定向到url
 * @param url    重定向地址
 * @param msec    定时器时间
 */
function redirectToUrl(url, msec) {
    msec = msec || 3000;
    window.setTimeout(function () {
        document.location = url;
    }, msec);
}

/**
 * ajax成功后回调函数
 * @param res    ajax返回信息对象
 */
function response(res)
{
    alert('ajax成功后回调函数');
    $('#loader').hide();
    if (res.status == 1)
    {
        $('#PldAjaxResult').css({color:'#B3E3B0'});
    }
    else
    {
        $('#PldAjaxResult').css({color:'red'});
    }
    $('#PldAjaxResult').html(res.info).show();
    window.setTimeout(function(){
        $('#PldAjaxResult').empty().hide();
    }, 5000);
}

/**
 * 初始化AJAX表单，表单样式和表单验证
 * @param _formId       表单id
 * @param _validate     表单前台校验函数[可选参数]
 * @param _rollback     ajax成功后回调函数[可选参数]
 * @param _dataType     接受服务端返回的类型[可选参数]
 */
function initAjaxForm(_formId, _validate, _rollback, _dataType){
    var options = {
        target:         typeof(_rollback) == "string" ? _rollback : '',
        /**
         * 表单提交前执行的方法
         * @param formData: 数组对象，提交表单时，Form插件会以Ajax方式自动提交这些数据，格式如：[{name:user,value:val },{name:pwd,value:pwd}]
         * @param jqForm:   jQuery对象，封装了表单的元素
         * @param options:  options对象
         */
        beforeSubmit:   function(formData, jqForm, options){
            //var queryString = $.param(formData);  //name=1&address=2
            /*for (var i=0; i < formData.length; i++) {
                alert(formData[i].name+' '+formData[i].value);
            }*/
            //var formElement = jqForm[0];              //将jqForm转换为DOM对象
            //var cate_name = formElement.cate_name.value;  //访问jqForm的DOM元素

            if(typeof(_validate) == "function"){
                if(_validate.call(this,formData, jqForm, options) == false){
                    return false;
                }
            }
            //$('#content'+' span.loading').fadeIn("fast");
            return true;
        },
        success:    function(responseText, statusText){
            //$('#content'+' span.loading').fadeOut("slow");
            if(typeof(_rollback) == "function"){
                try {
                    //服务器端输出的JSON格式"{msg:'密码重置成功'}"
                    _rollback.call(this,true,responseText);
                }catch(exception) {
                    _rollback.call(this,false,responseText);
                }
            }else{
                response(responseText);
            }
        },
        error: function (er) {
            //var json=JSON.parse(er.responseText);
            //var json=eval('('+er.responseText+')');
        },
        dataType:   _dataType?_dataType:'json'
    };
    $('#'+_formId).ajaxForm(options); // bind form using 'ajaxForm'
}

/**
 * 对象提示信息函数
 * @param errors     提示信息对象
 */
function showObjTip(errors, status) {
    var status = status || 1;
    for (var i in errors) {
        if ($('span.' + i).length > 0){
            $('span.' + i).html(errors[i]).show();

            if(TIME.timeout1 > 0) {
                window.clearTimeout(TIME.timeout1);
            }

            TIME.timeout1 = window.setTimeout(function(){
                $('span.error').empty().hide();
            }, 4000);
        }else{
            showTip(errors[i], status);
            break;
        }
    }
}

/**
 * 字符串提示信息函数
 * @param error     提示信息
 * @param status    状态，1表示失败，0表示成功
 */
function showTip(error, status) {
    if(TIME.timeout > 0) {
        window.clearTimeout(TIME.timeout);
    }

    //$('.show_tip').html(error).fadeIn("slow");
    $('.show_tip').empty().show();
    var pos = $('.show_tip').position();
    var color = status == '1' ? 'red' : 'green';

    $('.show_tip').html(error).css({top: pos.top - 30, color: color}).animate({
        top: pos.top
    }, 500);

    TIME.timeout = window.setTimeout(function(){
        $('.show_tip').fadeOut('slow', function(){
            $('.show_tip').css({top:pos.top}).empty();
        });
    }, 4000);
}

/**
 * 设置AJAX的全局默认设置
 * 之后执行的所有AJAX请求，如果对应的选项参数没有设置，将使用更改后的默认设置
 * @settings beforeSend     (局部事件) 当一个Ajax请求开始时触发。如果需要，你可以在这里设置XMLHttpRequest对象
 * @settings complete       (局部事件) 不管你请求成功还是失败，即便是同步请求，你都能在请求完成时触发这个事件
 * @settings success        (局部事件) 请求成功时触发。即服务器没有返回错误，返回的数据也没有错误
 */
function initAjax() {
    $.ajaxSetup({
        beforeSend: function () {
            alert('当一个Ajax请求开始时触发');
        },
        complete:function(o){
            //alert('对象状态，4为完成: ' + o.readyState);
            if (typeof o != 'undefined' && o.readyState == 4 && typeof o.responseText != 'undefined'){
                //alert('服务器返回状态，200表示成功: ' + o.status);
                try{
                    var data = $.parseJSON(o.responseText);
                }catch (e){
                    return ;
                }
                if (data && typeof data.errors != 'undefined') {
                    if (typeof data.errors == 'object'){
                        showObjTip(data.errors);
                    }else {
                        if (o.status == '200') {
                            showTip(data.errors, data.status);
                        }else {
                            showTip(data.message, 1);
                        }
                    }
                }
            }
        },
        success: function(responseText){

        }
    });
}

/**
 * 定义定时器对象存放器
 */
var TIME = {}

$(function () {
    initAjax();
});













/*function initAjaxForm1(_formId, _rollback, _validate, _dataType){
    var options = {
        target:         typeof(_rollback) == "string" ? _rollback:'',
        beforeSubmit:   function(formData, jqForm, options){
            $('#'+_formId + " :input").blur();  //
            if($('#'+_formId).errors.size()>0){
                $('#'+_formId + " :input[type=submit]").attr('disabled','');
                return false;
            }
            if(typeof(_validate) == "function"){
                if(_validate.call(this,formData, jqForm, options) == false){
                    $('#'+_formId + " :input[type=submit]").attr('disabled','');
                    return false;
                }
            }
            $('#content'+' span.loading').fadeIn("fast");
            clearSelectAll('#'+_formId);
            return true;
        },
        success:    function(responseText, statusText){
            $('#content'+' span.loading').fadeOut("slow");
            if(typeof(_rollback) == "function"){
                try {
                    //服务器端输出的JSON格式"{msg:'密码重置成功'}"
                    _rollback.call(this,true,eval("("+responseText+")").msg);
                }catch(exception) {
                    _rollback.call(this,false,responseText);
                }
            }
        },
        dataType:   _dataType?_dataType:'json'
    };
    $('#'+_formId).ajaxForm(options); // bind form using 'ajaxForm'
}*/
