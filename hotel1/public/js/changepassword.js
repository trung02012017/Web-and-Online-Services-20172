$(document).ready(function () {
    $('#changepassword').click(function () {
        // var username = $('#username').val();
        var old = $('#oldpassword').val();
        var new1 = $('#newpassword').val();
        var new2 = $('#newpassword2').val();

        if (new1 !== new2) {
            if (!$('#alert').length) {
                $('#alert2').remove();
                $('#alert3').remove();
                $("#newpassword2").after("<div style='margin: 15px' id='alert'><i style='color: red'>2 mật khẩu mới không trùng khớp</i></div>");
            }
        }
        else if (old === new1) {
            if (!$('#alert2').length) {
                $('#alert1').remove();
                $('#alert3').remove();
                $("#newpassword2").after("<div style='margin: 15px' id='alert2'><i style='color: red'>Mật khẩu mới không được trùng mật khẩu cũ</i></div>");
            }
        }
        else {
            $.ajax({
                url: "/user/changepassword",
                type: 'POST',
                data: {
                    // username: username,
                    old: old,
                    new1: new1
                },
                success: function (result) {
                    if (result == 0)
                    {
                        if (!$('#alert3').length) {
                            $('#alert1').remove();
                            $('#alert2').remove();
                            $("#newpassword2").after("<div style='margin: 15px' id='alert3'><i style='color: red'>Mật khẩu cũ không đúng</i></div>");
                        }
                    }
                    else
                    {
                        alert("Vui lòng đăng nhập lại với mật khẩu mới");
                        window.location.replace("/logout");
                    }
                }
            });
        }
    });
})