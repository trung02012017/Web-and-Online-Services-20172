function testTriger(){
    setTimeout(function (){
        $(".cstyle01").resize();
    }, 500);
}

function trigerJslider(){
    jQuery("#location").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
    testTriger();
}

function trigerJslider2(){
    jQuery("#room").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider3(){
    jQuery("#service").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider4(){
    jQuery("#cleaness").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider5(){
    jQuery("#value").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider6(){
    jQuery("#comfort").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider7(){
    jQuery("#equipment").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider8(){
    jQuery("#hotel").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

function trigerJslider9(){
    jQuery("#meal").slider({ from: 0, to: 10, step: 0.1, smooth: true, round: 1, dimension: "", skin: "round" });
}

$(document).ready(function(){
    $("#showreview").click(function(){
        $("#roomrates").removeClass("active in");
        $("#maps").removeClass("active in");
        $("#reviews").addClass( "active in" );
        mySelectUpdate();
        trigerJslider();
        trigerJslider2();
        trigerJslider3();
        trigerJslider4();
        trigerJslider5();
        trigerJslider6();
        trigerJslider7();
        trigerJslider8();
        trigerJslider9();
    });

    $("#showbook").click(function () {
        $("#reviews").removeClass( "active in" );
        $("#maps").removeClass("active in");
        $("#roomrates").addClass("active in");
    });
});