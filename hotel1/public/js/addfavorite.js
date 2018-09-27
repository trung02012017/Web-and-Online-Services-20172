$(document).ready(function () {
   $('#addfavorite').click(function () {
       var hotelid = $(this).data("hotelid");
       var userid = $(this).data("userid");

       $.ajax({
           url: "/favorite/add",
           type: 'POST',
           data: {
               userid: userid,
               hotelid: hotelid
           },
           success: function (result) {
               if (result == 1)
                   $('#addfavorite').html("Bỏ yêu thích");
               else
                   $('#addfavorite').html("Yêu thích");
           }
       });
   });
});