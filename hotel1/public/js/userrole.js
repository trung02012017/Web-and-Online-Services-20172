$(function() {
    $('.js-user-role').change(function(){
      if ($(this).prop('checked'))
        roleid = 1;
      else
        roleid = 0;
      var userid = $(this).data('userid');
      $.ajax({
        url: "/user/updaterole",
        type:'POST',
        data:{
          userid: userid,
          roleid: roleid
        },
        success: function(){
          //alert("success");
        }
      });
    });
})
