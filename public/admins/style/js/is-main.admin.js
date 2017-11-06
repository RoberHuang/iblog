//添加
$(function () {
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
});

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


//验证
function beforeSendForm(arr, $frm, options)
{
    $('#loader').show();
    return CheckForm(arr, $frm, options);
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

//初始化表单验证
function initFormCheck(carr)
{
    checkArray = carr || checkArray; //checkArray可以外部定义
    if(typeof checkArray != 'undefined')
    {
        $(checkArray).each(function(){
            var self = this;
            var o = $('input[name="' +this.name+ '"], select[name="' +this.name+ '"]').get(0);
            if(o)
            {
                for(var i in self)
                {
                    o[i] = self[i];
                    if(i == 'check' && self[i] != '')
                    {
                        var arr = trim(self[i]).split(/\s+/);
                        if(arr.length > 1)
                        {
                            for(var j = 0; j < arr.length; j ++)
                            {
                                if(arr[j] == 'Require' || arr[j] == 'PRequire' || arr[j] == 'Username')
                                {
                                    $(o).addClass('bLeftRequire');
                                    break;
                                }
                            }
                        }
                        else
                        {
                            if(arr == 'Require' || arr == 'PRequire' || arr == 'Username')
                            {
                                $(o).addClass('bLeftRequire');
                            }
                        }
                    }
                }
            }
        });
    }
}

//初始化表单样式，.date .ip
function initFormElement()
{
    if(typeof $.fn.datepicker != 'undefined')
    {
        $('form input.date').datepicker({
            changeMonth: true,
            changeYear: true
        });
    }
}

/**
 * 初始化AJAX表单，表单样式和表单验证
 * @param frm    表单[可选参数]
 */
function initAjaxForm(frm, submit)
{
    if(typeof frm != 'undefined')
    {
        $(frm).ready(function(){
            initFormCheck();
            initFormElement();
        });
        $(frm).ajaxForm({
            beforeSubmit:  function(els, frm){
                if(!CheckForm(els, frm))
                {
                    return false;
                }
                if(typeof submit === 'function')
                {
                    return submit.call(this);
                }
            },  // pre-submit callback
            success:       response,  // post-submit callback
            dataType:      'json'
        });
    }
    else
    {
        $('form.ajaxForm').ajaxForm({
            beforeSubmit: function(els, frm){
                if(!CheckForm(els, frm))
                {
                    return false;
                }
                if(typeof submit === 'function')
                {
                    return submit.call(frm);
                }
            },  // pre-submit callback
            success:       response,  // post-submit callback
            dataType:      'json'
        });
    }
}
