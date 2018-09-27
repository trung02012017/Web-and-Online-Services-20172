function getFilter() {
    stars = [];
    $('input[name="stars[]"]:checked').each(function()
    {
        stars.push(parseInt($(this).val()));
    });

    var min_price = parseFloat($("#price").val().split(";")[0]);
    var max_price = parseFloat($("#price").val().split(";")[1]);
    var min_distance = parseFloat($("#distance").val().split(";")[0]);
    var max_distance = parseFloat($("#distance").val().split(";")[1]);

    if($('#Acomodation1').is(':checked'))
        type = 'hotel';
    else
        type = 'resort';

    references = [];
    references.push($("#wifi").is(":checked"));
    references.push($("#park").is(":checked"));
    references.push($("#elevator").is(":checked"));
    references.push($("#spa").is(":checked"));
    references.push($("#pool").is(":checked"));
    references.push($("#gym").is(":checked"));
    references.push($("#restaurant").is(":checked"));
    references.push($("#coffee").is(":checked"));
    references.push($("#bar").is(":checked"));
    references.push($("#pets").is(":checked"));

    for (var i = 0; i < references.length; i++)
    {
        if (references[i] === false)
            references[i] = 0;
        else
            references[i] = 1;
    }

    return [stars, min_price, max_price, min_distance, max_distance, type, references];
}

$(document).ready(function () {
    var stars = [];
    $('#getsupport').click(function (e) {
        e.preventDefault();
        filter_list = getFilter();
        stars = filter_list[0];
        min_price = filter_list[1];
        max_price = filter_list[2];
        min_distance = filter_list[3];
        max_distance = filter_list[4];
        type = filter_list[5];
        references = filter_list[6];

        if (stars.length === 0)
            stars.push(1, 2, 3, 4, 5);
        var city = $('#city').text();

        var w1 = $('#distancetocentre').val();
        var w2 = $('#facility').val();
        var w3 = $('#lowestprice').val();
        var w4 = $('#stars').val();
        var w5 = $('#rate').val();
        var w6 = $('#popular').val();

        $.ajax({
            url: "/hotel/dss",
            type: 'POST',
            data: {
                city: city,
                stars: stars,
                min_price: min_price,
                max_price: max_price,
                min_distance: min_distance,
                max_distance: max_distance,
                type: type,
                references: references,
                w1: w1,
                w2: w2,
                w3: w3,
                w4: w4,
                w5: w5,
                w6: w6
            },
            success: function (markup) {
                $('#hotellist').html(markup);
            }
        });
    });
})