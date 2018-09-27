$(document).ready(function () {
    $('#update').click(function () {
        var hotelid = $('#hotelid').val();
        var checkin = $('#datepicker').val();
        var checkout = $('#datepicker2').val();
        var sophong = $('#sophong').val();
        var sokhach = $('#sokhach').val();
        if (checkin === "" || checkout === "")
        {
            if (!$('#alert').length)
                $("#updatediv").after("<div style='margin: 15px' id='alert'><i style='color: red'>Hãy chọn đầy đủ ngày nhận và trả phòng</i></div>");
        }
        else {
            $.ajax({
                url: "/room/update",
                type:'POST',
                data:{
                    hotelid: hotelid,
                    checkin: checkin,
                    checkout: checkout
                },
                success: function (markup) {
                    $('#roomlist').html(markup);
                }
            });
        }
    });
})