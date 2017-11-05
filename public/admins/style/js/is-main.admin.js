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