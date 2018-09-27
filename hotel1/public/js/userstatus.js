$(function() {
    $('.js-user-status').change(function(){
      if ($(this).prop('checked'))
        status = 1;
      else
        status = 0;
      var userid = $(this).data('userid');
      $.ajax({
        url: "/user/updatestatus",
        type:'POST',
        data:{
          userid: userid,
          status: status
        },
        success: function(html){
          //alert(123);
        }
      });
    });
})
