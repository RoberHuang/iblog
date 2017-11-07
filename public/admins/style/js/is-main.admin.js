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

//排序
function changeOrder(obj, id, url){
    var token = $('meta[name="csrf-token"]').attr('content');
    var order = $(obj).val();
    $.post(url, {'_token': token, 'id': id, 'order': order}, function(data){
        if(data.status == 0){
            layer.msg(data.result, {icon: 6});
        }else{
            layer.msg(data.result, {icon: 5});
        }
    });
}

//删除
function del(url) {
    layer.confirm(CONFIRM_DEL, {
        btn: [SURE, CANCEL]
    }, function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(url, {'_method': 'delete','_token': token},function (data) {
            if(data.status==0){
                layer.msg(data.result, {icon: 6});
                window.setTimeout(function () {
                    location.href = location.href;
                },3000);
            }else{
                layer.msg(data.result, {icon: 5});
            }
        });
    }, function(){

    });
}


//ajax成功后回调
function response(res)
{
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
 * @param _formId    表单[可选参数]
 * @param _rollback    表单[可选参数]
 * @param _validate    表单[可选参数]
 * @param _dataType    表单[可选参数]
 */
function initAjaxForm(_formId, _rollback, _validate, _dataType){
    var options = {
        target:         typeof(_rollback) == "string" ? _rollback:'',
        beforeSubmit:   function(formData, jqForm, options){
            $('#'+_formId + " :input").blur();  //

            if($('#'+_formId).errors.size()>0){
                $('#'+_formId + " :input[type=submit]").attr('disabled','');
                return false;
            }
            alert(typeof(_validate));
            if(typeof(_validate) == "function"){
                alert(1);
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
}

function initAjaxForm1(_formId, _rollback, _validate, _dataType){
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
}