$(document).ready(function() {
    $("#addreview").click(function(){
        var hotelid = parseInt($(this).val());
        var location = parseFloat($("#location").val().split(";")[1]);
        var room = parseFloat($("#room").val().split(";")[1]);
        var service = parseFloat($("#service").val().split(";")[1]);
        var cleaness = parseFloat($("#cleaness").val().split(";")[1]);
        var value = parseFloat($("#value").val().split(";")[1]);
        var comfort = parseFloat($("#comfort").val().split(";")[1]);
        var equipment = parseFloat($("#equipment").val().split(";")[1]);
        var hotel = parseFloat($("#hotel").val().split(";")[1]);
        var meal = parseFloat($("#meal").val().split(";")[1]);
        var review = $("#comment").val();
        if(review == null || review == "")
        {
            if (!$('#leavecomment').length) {
                $("#comment").after("<div style='margin-top: 10px' id='leavecomment'><i style='color: red'>Hãy để lại nhận xét của bạn</i></div>");
            }
        }
        else
        {
            $.ajax({
                url: "/review/addreview",
                type:'POST',
                data:{
                    hotelid: hotelid,
                    location : location,
                    room: room,
                    service: service,
                    cleaness: cleaness,
                    value: value,
                    comfort: comfort,
                    equipment: equipment,
                    hotel: hotel,
                    meal: meal,
                    review: review
                },
                success: function(result){
                    result = JSON.parse(result);
                    if (result.success === true)
                    {
                        alert("Cám ơn sự đánh giá của bạn");
                        window.location.href=window.location.href;
                    }
                    else {
                        alert("Xin mời bạn đặt phòng để đánh giá khách sạn này!");
                    }
                }
            });
        }
    });
})