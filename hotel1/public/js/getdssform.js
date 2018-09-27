function testTriger(){
    setTimeout(function (){
        $(".cstyle01").resize();
    }, 500);
}

function trigerJslider(){
    jQuery("#distancetocentre").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
    testTriger();
}

function trigerJslider2(){
    jQuery("#facility").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider3(){
    jQuery("#lowestprice").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider4(){
    jQuery("#stars").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider5(){
    jQuery("#rate").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider6(){
    jQuery("#popular").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

$(document).ready(function () {
    $('#getdssform').click(function () {
        // trigerJslider();
        // trigerJslider2();
        // trigerJslider3();
        // trigerJslider4();
        // trigerJslider5();
        // trigerJslider6();

       var e = $('#dssform')[0];
       if (e.style.display === 'none')
           e.style.display = 'block';
       else
           e.style.display = 'none';
    });
})