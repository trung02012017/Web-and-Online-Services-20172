$(document).ready(function () {
    $('.btn-search5.right').click(function () {
        var hotel_id = $(this).data('hotelid');
        var divid = '#info'.concat(hotel_id);

        var e = $(divid)[0];

        if (e.style.display === 'none')
            e.style.display = 'block';
        else
            e.style.display = 'none';
    });
})