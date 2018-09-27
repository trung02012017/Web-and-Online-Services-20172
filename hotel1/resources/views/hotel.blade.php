<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?php echo "Khách sạn tại " . $ds_hotel[0]->city; ?></title>

    <!-- Bootstrap -->
    <link href="{{asset('dist/css/bootstrap.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" media="screen">

    <!-- Carousel -->
    <link href="{{asset('examples/carousel/carousel.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/fullscreen.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('rs-plugin/css/settings.css')}}" media="screen" />

    <!-- Picker UI-->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}" />

    <!-- bin/jquery.slider.min.css -->
    <link rel="stylesheet" href="{{asset('plugins/jslider/css/jslider.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('plugins/jslider/css/jslider.round.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('plugins/jslider/css/bootstrap-slider.css')}}" type="text/css">
    {{--<link rel="stylesheet" href="{{asset('plugins/jslider/css/jslider.round-blue.css')}}" type="text/css">--}}

    <!-- mytour css-->
    <link rel="stylesheet" href="{{asset('css/mytour.css')}}">

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery.v2.0.3.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>

    <!-- bin/jquery.slider.min.js -->
    <script type="text/javascript" src="{{asset('plugins/jslider/js/jshashtable-2.1_src.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jslider/js/jquery.numberformatter-1.2.3.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jslider/js/tmpl.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jslider/js/jquery.dependClass-0.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jslider/js/draggable-0.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jslider/js/jquery.slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jslider/js/bootstrap-slider.js')}}"></script>
    <!-- end -->

    <script type="text/javascript" src="{{asset('js/filter.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sort.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/getdssform.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/supportsystem.js')}}"></script>

</head>
<body id="top" class="thebg" >

@include('layouts.header')

<div class="container breadcrub">
    <div>
        <a class="homebtn left" href="{{url('/')}}"></a>
        <div class="left">
            <ul class="bcrumbs">
                <li>/</li>
                <li>Khách sạn</li>
                <li>/</li>
                <li><a href="{{url('hotel/' . $ds_hotel[0]->city)}}" class="active" id="city"><?php echo $ds_hotel[0]->city; ?></a></li>
            </ul>
        </div>
        <a class="backbtn right" href="#"></a>
    </div>
    <div class="clearfix"></div>
    <div class="brlines"></div>
</div>

<!-- CONTENT -->
<div class="container">
    <div class="container pagecontainer offset-0">

        @include('layouts.filterbar')

        <!-- LIST CONTENT-->
        <div class="rightcontent col-md-9 offset-0">

            <div class="hpadding20">
                <!-- Top filters -->
                <div class="topsortby">
                    <div class="col-md-4 offset-0">

                        <div class="left mt7"><b>Sắp xếp:</b></div>

                        <div class="right wh70percent">
                            <select class="form-control mySelectBoxClass " id="sortoption">
                                <option selected data-prop="number_of_rate" data-option="desc">Phổ biến nhất</option>
                                <option data-prop="stars" data-option="asc">Từ 1 đến 5 sao</option>
                                <option data-prop="stars" data-option="desc">Từ 5 đến 1 sao</option>
                                <option data-prop="lowest_price" data-option="asc">Giá tăng dần</option>
                                <option data-prop="lowest_price" data-option="desc">Giá giảm dần</option>
                                <option data-prop="distance_to_centre" data-option="asc">Khoảng cách đến trung tâm</option>
                                <option data-prop="rate" data-option="desc">Đánh giá cao nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 offset-5">
                    <p>Muốn tìm khách sạn phù hợp nhất?<button class="bookbtn mt1" style="margin-left: 10px" type="submit" id="getdssform">Nhấn vào đây</button></p>
                    </div>
                </div>
                <div class="topsortby" style="display: none;" id="dssform">
                    <b>Chọn mức độ quan trọng của các tiêu chí trên thang 10</b>
                    <div class="slidecontainer">
                        <label style="width: 150px">Gần trung tâm</label>
                        <span><input type="range" min="0" max="10" value="5" class="slider" id="distancetocentre"></span>
                        <p id="distancevalue">5</p>
                        <script type="text/javascript">
                            var slider = document.getElementById("distancetocentre");
                            var output = document.getElementById("distancevalue");
                            output.innerHTML = slider.value; // Display the default slider value

                            // Update the current slider value (each time you drag the slider handle)
                            slider.oninput = function() {
                                output.innerHTML = this.value;
                            }
                        </script>
                        <br>

                        <label style="width: 150px">Nhiều tiện nghi</label>
                        <span><input type="range" min="0" max="10" value="5" class="slider" id="facility"></span>
                        <p id="facilityvalue">5</p>
                        <script type="text/javascript">
                            var slider1 = document.getElementById("facility");
                            var output1 = document.getElementById("facilityvalue");
                            output1.innerHTML = slider1.value; // Display the default slider value

                            // Update the current slider value (each time you drag the slider handle)
                            slider1.oninput = function() {
                                output1.innerHTML = this.value;
                            }
                        </script>
                        <br>

                        <label style="width: 150px">Giá rẻ</label>
                        <span><input type="range" min="0" max="10" value="5" class="slider" id="lowestprice"></span>
                        <p id="pricevalue">5</p>
                        <script type="text/javascript">
                            var slider2 = document.getElementById("lowestprice");
                            var output2 = document.getElementById("pricevalue");
                            output2.innerHTML = slider2.value; // Display the default slider value

                            // Update the current slider value (each time you drag the slider handle)
                            slider2.oninput = function() {
                                output2.innerHTML = this.value;
                            }
                        </script>
                        <br>

                        <label style="width: 150px">Sang trọng</label>
                        <span><input type="range" min="0" max="10" value="5" class="slider" id="stars"></span>
                        <p id="starsvalue">5</p>
                        <script type="text/javascript">
                            var slider3 = document.getElementById("stars");
                            var output3 = document.getElementById("starsvalue");
                            output3.innerHTML = slider3.value; // Display the default slider value

                            // Update the current slider value (each time you drag the slider handle)
                            slider3.oninput = function() {
                                output3.innerHTML = this.value;
                            }
                        </script>
                        <br>

                        <label style="width: 150px">Được đánh giá cao</label>
                        <span><input type="range" min="0" max="10" value="5" class="slider" id="rate"></span>
                        <p id="ratevalue">5</p>
                        <script type="text/javascript">
                            var slider4 = document.getElementById("rate");
                            var output4 = document.getElementById("ratevalue");
                            output4.innerHTML = slider4.value; // Display the default slider value

                            // Update the current slider value (each time you drag the slider handle)
                            slider4.oninput = function() {
                                output4.innerHTML = this.value;
                            }
                        </script>
                        <br>

                        <label style="width: 150px">Nổi tiếng</label>
                        <span><input type="range" min="0" max="10" value="5" class="slider" id="popular"></span>
                        <p id="popularvalue">5</p>
                        <script type="text/javascript">
                            var slider5 = document.getElementById("popular");
                            var output5 = document.getElementById("popularvalue");
                            output5.innerHTML = slider5.value; // Display the default slider value

                            // Update the current slider value (each time you drag the slider handle)
                            slider5.oninput = function() {
                                output5.innerHTML = this.value;
                            }
                        </script>
                    </div>

                    {{--<div class="layout-slider wh100percent">--}}
                        {{--<span class="cstyle01"><p>Gần trung tâm</p><input id="distancetocentre" type="slider" name="distance" value="0;10" /></span>--}}
                    {{--</div>--}}
                    {{--<script type="text/javascript" >--}}
                        {{--jQuery("#distancetocentre").slider({ from: 0, to: 10, step: 1, smooth: true, round: 0, dimension: "", skin: "round" });--}}
                    {{--</script>--}}

                    {{--<div class="layout-slider margtop10 wh100percent">--}}
                        {{--<span class="cstyle01"><p>Nhiều tiện nghi</p><input id="facility" type="slider" name="facility" value="0;10" /></span>--}}
                    {{--</div>--}}
                    {{--<script type="text/javascript" >--}}
                        {{--jQuery("#facility").slider({ from: 0, to: 10, step: 1, smooth: true, round: 0, dimension: "", skin: "round" });--}}
                    {{--</script>--}}

                    {{--<div class="layout-slider margtop10 wh100percent">--}}
                        {{--<span class="cstyle01"><p>Giá rẻ</p><input id="lowestprice" type="slider" name="price" value="0;10" /></span>--}}
                    {{--</div>--}}
                    {{--<script type="text/javascript" >--}}
                        {{--jQuery("#lowestprice").slider({ from: 0, to: 10, step: 1, smooth: true, round: 0, dimension: "", skin: "round" });--}}
                    {{--</script>--}}

                    {{--<div class="layout-slider margtop10 wh100percent">--}}
                        {{--<span class="cstyle01"><p>Sang trọng</p><input id="stars" type="slider" name="stars" value="0;10" /></span>--}}
                    {{--</div>--}}
                    {{--<script type="text/javascript" >--}}
                        {{--jQuery("#stars").slider({ from: 0, to: 10, step: 1, smooth: true, round: 0, dimension: "", skin: "round" });--}}
                    {{--</script>--}}

                    {{--<div class="layout-slider margtop10 wh100percent">--}}
                        {{--<span class="cstyle01"><p>Được đánh giá cao</p><input id="rate" type="slider" name="rate" value="0;10" /></span>--}}
                    {{--</div>--}}
                    {{--<script type="text/javascript" >--}}
                        {{--jQuery("#rate").slider({ from: 0, to: 10, step: 1, smooth: true, round: 0, dimension: "", skin: "round" });--}}
                    {{--</script>--}}

                    {{--<div class="layout-slider margtop10 wh100percent">--}}
                        {{--<span class="cstyle01"><p>Nổi tiếng</p><input id="popular" type="slider" name="popular" value="0;10" /></span>--}}
                    {{--</div>--}}
                    {{--<script type="text/javascript" >--}}
                        {{--jQuery("#popular").slider({ from: 0, to: 10, step: 1, smooth: true, round: 0, dimension: "", skin: "round" });--}}
                    {{--</script>--}}

                    {{--<div class="col-md-4 offset-0">--}}
                        {{--<div class="left mt7"><b>Tiêu chí 1:</b></div>--}}
                        {{--<div class="right wh70percent">--}}
                            {{--<select class="form-control mySelectBoxClass " id="criteria1">--}}
                                {{--<option value="distance">Gần trung tâm</option>--}}
                                {{--<option value="facility">Nhiều tiện nghi</option>--}}
                                {{--<option selected value="price">Giá rẻ</option>--}}
                                {{--<option value="stars">Sang trọng</option>--}}
                                {{--<option value="rate">Đánh giá cao</option>--}}
                                {{--<option value="popular">Nổi tiếng</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</br></br>--}}

                    {{--<div class="col-md-4 offset-0">--}}
                        {{--<div class="left mt7"><b>Tiêu chí 2:</b></div>--}}
                        {{--<div class="right wh70percent">--}}
                            {{--<select class="form-control mySelectBoxClass " id="criteria2">--}}
                                {{--<option value="distance">Gần trung tâm</option>--}}
                                {{--<option selected value="facility">Nhiều tiện nghi</option>--}}
                                {{--<option selected value="price">Giá rẻ</option>--}}
                                {{--<option value="stars">Sang trọng</option>--}}
                                {{--<option value="rate">Đánh giá cao</option>--}}
                                {{--<option value="popular">Nổi tiếng</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</br></br>--}}

                    {{--<div class="col-md-4 offset-0">--}}
                        {{--<div class="left mt7"><b>Tiêu chí 3:</b></div>--}}

                        {{--<div class="right wh70percent">--}}
                            {{--<select class="form-control mySelectBoxClass " id="criteria3">--}}
                                {{--<option value="distance">Gần trung tâm</option>--}}
                                {{--<option value="facility">Nhiều tiện nghi</option>--}}
                                {{--<option selected value="price">Giá rẻ</option>--}}
                                {{--<option value="stars">Sang trọng</option>--}}
                                {{--<option selected value="rate">Đánh giá cao</option>--}}
                                {{--<option value="popular">Nổi tiếng</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</br></br>--}}

                    {{--<div class="col-md-4 offset-0">--}}
                        {{--<div class="left mt7"><b>Tiêu chí 4:</b></div>--}}
                        {{--<div class="right wh70percent">--}}
                            {{--<select class="form-control mySelectBoxClass " id="criteria4">--}}
                                {{--<option selected value="distance">Gần trung tâm</option>--}}
                                {{--<option value="facility">Nhiều tiện nghi</option>--}}
                                {{--<option selected value="price">Giá rẻ</option>--}}
                                {{--<option value="stars">Sang trọng</option>--}}
                                {{--<option value="rate">Đánh giá cao</option>--}}
                                {{--<option value="popular">Nổi tiếng</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</br></br>--}}

                    {{--<div class="col-md-4 offset-0">--}}
                        {{--<div class="left mt7"><b>Tiêu chí 5:</b></div>--}}
                        {{--<div class="right wh70percent">--}}
                            {{--<select class="form-control mySelectBoxClass " id="criteria5">--}}
                                {{--<option value="distance">Gần trung tâm</option>--}}
                                {{--<option value="facility">Nhiều tiện nghi</option>--}}
                                {{--<option selected value="price">Giá rẻ</option>--}}
                                {{--<option selected value="stars">Sang trọng</option>--}}
                                {{--<option value="rate">Đánh giá cao</option>--}}
                                {{--<option value="popular">Nổi tiếng</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</br></br>--}}

                    {{--<div class="col-md-4 offset-0">--}}
                        {{--<div class="left mt7"><b>Tiêu chí 6:</b></div>--}}
                        {{--<div class="right wh70percent">--}}
                            {{--<select class="form-control mySelectBoxClass " id="criteria6">--}}
                                {{--<option value="distance">Gần trung tâm</option>--}}
                                {{--<option value="facility">Nhiều tiện nghi</option>--}}
                                {{--<option selected value="price">Giá rẻ</option>--}}
                                {{--<option value="stars">Sang trọng</option>--}}
                                {{--<option value="rate">Đánh giá cao</option>--}}
                                {{--<option selected value="popular">Nổi tiếng</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</br></br></br>--}}

                    <div class="col-md-4 offset-0">
                        <button class="bluebtn" id="getsupport" style="margin-top: 10px">Hoàn tất</button>
                    </div>

                </div>
                <!-- End of topfilters-->
            </div>
            <!-- End of padding -->

            <br/><br/>
            <div class="clearfix"></div>


            @include('hotellist')
            <!-- End of offset1-->

            {{--<div class="hpadding20">--}}

                {{--<ul class="pagination right paddingbtm20">--}}
                    {{--<li class="disabled"><a href="#">&laquo;</a></li>--}}
                    {{--<li><a href="#">1</a></li>--}}
                    {{--<li><a href="#">2</a></li>--}}
                    {{--<li><a href="#">3</a></li>--}}
                    {{--<li><a href="#">4</a></li>--}}
                    {{--<li><a href="#">5</a></li>--}}
                    {{--<li><a href="#">&raquo;</a></li>--}}
                {{--</ul>--}}

            {{--</div>--}}

        </div>
        <!-- END OF LIST CONTENT-->



    </div>
    <!-- END OF container-->

</div>
<!-- END OF CONTENT -->


@include('layouts.footer2')

<!-- Javascript -->
<script src="{{asset('assets/js/js-list4.js')}}"></script>

<!-- Custom Select -->
<script type='text/javascript' src='{{asset('assets/js/jquery.customSelect.js')}}'></script>

<!-- Custom Select -->
<script type='text/javascript' src='{{asset('js/lightbox.js')}}'></script>

<!-- JS Ease -->
<script src="{{asset('assets/js/jquery.easing.js')}}"></script>

<!-- Custom functions -->
<script src="{{asset('assets/js/functions.js')}}"></script>

<!-- jQuery KenBurn Slider  -->
<script type="text/javascript" src="{{asset('rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- Counter -->
<script src="{{asset('assets/js/counter.js')}}"></script>

<!-- Nicescroll  -->
<script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>

<!-- Picker -->
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>

</body>
</html>
