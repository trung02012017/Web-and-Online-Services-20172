$(document).ready(function () {
    $('#updateprofile').click(function () {
        if($('#ms').is(':checked'))
            var sex = 2;
        else if ($('#mr').is(':checked'))
            var sex = 1;
        else
            var sex = 3;

        var name = $('#name').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var birth_date = $('#datepicker').val();
        var address = $('#address').val();
        var city = $('#city').val();
        var district = $('#district').val();
        var id = $('#updateprofile').val();
        if (name === "" || username === "" || email === "" || phone === "" || birth_date === "" || address === "" || city === "" || district === "")
        {
            if (!$('#alert').length)
                $("#district").after("<div style='margin: 15px' id='alert'><i style='color: red'>Hãy nhập đầy đủ thông tin</i></div>");
        }
        else {
            $.ajax({
                url: "/user/update",
                type:'POST',
                data:{
                    id: id,
                    sex: sex,
                    name: name,
                    username: username,
                    email: email,
                    phone: phone,
                    birth_date: birth_date,
                    address: address,
                    city: city,
                    district: district
                },
                success: function () {
                    alert("Cập nhật thông tin thành công");
                    window.location.href=window.location.href;
                }
            });
        }
    });
})