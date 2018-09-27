$(function() {
    $('.bluebtn.margtop20').click(function(){
        var hotelid = $(this).val();

        var type;
        if ($('#Acomodation1'.concat(hotelid)).prop('checked'))
            type = 'hotel';
        else
            type = 'resort';

        var name = $('#name'.concat(hotelid)).val();
        var description = $('#description'.concat(hotelid)).val();
        var city = $('#city'.concat(hotelid)).val();
        var address = $('#address'.concat(hotelid)).val();
        var distance = $('#distance'.concat(hotelid)).val();
        var lowest_price = $('#lowest_price'.concat(hotelid)).val();
        var stars = $('#stars'.concat(hotelid)).val();

        var wifi = $('#wifi'.concat(hotelid)).prop('checked') ? 1 : 0;
        var park = $('#park'.concat(hotelid)).prop('checked') ? 1 : 0;
        var elevator = $('#elevator'.concat(hotelid)).prop('checked') ? 1 : 0;
        var spa = $('#spa'.concat(hotelid)).prop('checked') ? 1 : 0;
        var pool = $('#pool'.concat(hotelid)).prop('checked') ? 1 : 0;
        var gym = $('#gym'.concat(hotelid)).prop('checked') ? 1 : 0;
        var restaurant = $('#restaurant'.concat(hotelid)).prop('checked') ? 1 : 0;
        var coffee = $('#coffee'.concat(hotelid)).prop('checked') ? 1 : 0;
        var bar = $('#bar'.concat(hotelid)).prop('checked') ? 1 : 0;
        var pets = $('#pets'.concat(hotelid)).prop('checked') ? 1 : 0;

        if (name === '' || description === '' || city === '' || address === '' || distance === '' || lowest_price === '' || stars === '')
        {
            if (!$('#alert').length)
                $(this).before("<div style='margin: 15px' id='alert'><i style='color: red'>Hãy nhập đầy đủ thông tin</i></div>");
        }
        else {
            $.ajax({
                url: "/hotel/updatehotel",
                type:'POST',
                data:{
                hotelid: hotelid,
                type: type,
                name: name,
                description: description,
                city: city,
                address: address,
                distance: distance,
                lowest_price: lowest_price,
                stars: stars,
                wifi: wifi,
                park: park,
                elevator: elevator,
                spa: spa,
                pool: pool,
                gym: gym,
                restaurant: restaurant,
                coffee: coffee,
                bar: bar,
                pets: pets
                },
                success: function(html){
                    alert('Cập nhật thành công');
                    window.location.href = window.location.href;
                }
            });
        }
    });
})