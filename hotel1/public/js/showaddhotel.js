$(document).ready(function () {
   $('#addht').click(function () {
      var e = $('#newinfor')[0];

       if (e.style.display === 'none')
           e.style.display = 'block';
       else
           e.style.display = 'none';
   });
});