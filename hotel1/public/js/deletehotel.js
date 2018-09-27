$(document).ready(function () {
    $('.close.mr20.mt10').click(function () {
        var hotel_id = $(this).val();

        $.ajax({
            url: "/hotel/delete",
            type:'POST',
            data:{
                hotel_id: hotel_id
            },
            success: function () {
                //window.location.href = window.location.href;
            }
        });
    });
})