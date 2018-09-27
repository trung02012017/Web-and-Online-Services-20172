<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?php echo $hotel->name; ?></title>

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
    <link rel="stylesheet" href="{{asset('plugins/jslider/css/jslider.round-blue.css')}}" type="text/css">

    <!-- jQuery-->
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
    <!-- end -->



</head>
<body id="top" class="thebg" >

@include('layouts.header')

<div class="container breadcrub">
    <div>
        <a class="homebtn left" href="{{url('')}}"></a>
        <div class="left">
            <ul class="bcrumbs">
                <li>/</li>
                <li>Khách sạn</li>
                <li>/</li>
                <li><a href="{{url('hotel/' . $hotel->city)}}" class="active"><?php echo $hotel->city; ?></a></li>
                <li>/</li>
                <li id="hotelid" value="<?php echo $hotel->id; ?>"><?php echo $hotel->name; ?></li>
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

        <!-- SLIDER -->
        <div class="col-md-8 details-slider">

            <div id="c-carousel">
                <div id="wrapper">
                    <div id="inner">
                        <div id="caroufredsel_wrapper2">
                            <div id="carousel">
                                <?php
                                    $path = public_path('images/' . $hotel->img_folder);
                                ?>
                                @foreach(glob($path . '/*.*') as $file)
                                <img src="{{asset('images/' . $hotel->img_folder . '/' . basename($file))}}" width="723" height="407" alt=""/>
                                @endforeach
                            </div>
                        </div>
                        <div id="pager-wrapper">
                            <div id="pager">
                                @foreach(glob($path . '/*.*') as $file)
                                <img src="{{asset('images/' . $hotel->img_folder . '/' . basename($file))}}" width="120" height="68" alt=""/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div> <!-- /c-carousel -->
        </div>
        <!-- END OF SLIDER -->

        <!-- RIGHT INFO -->
        <div class="col-md-4 detailsright offset-0">
            <div class="padding20">
                <h4 class="lh1"><?php echo $hotel->name; ?></h4>
                <img src="{{asset('images/filter-rating-' . $hotel->stars . '.png')}}" alt=""/>
            </div>

            <div class="line3"></div>

            <div class="hpadding20">
                <h2 class="opensans slim green2">
                    <?php
                    $rate = $hotel->rate;
                    if ($rate >= 8) echo "Xuất sắc!";
                    else if ($rate < 8 && $rate >= 7) echo "Tốt";
                    else if ($rate < 7 && $rate >= 5) echo "Khá";
                    else echo "Trung bình";
                    ?>
                </h2>
            </div>

            <?php
            // tính số lượng khách recommend khách sạn và đánh giá trung bình
                $recommends = 0;
                foreach ($reviews as $review)
                {
                    if ($review->avg_rating >= 8)
                        $recommends += 1;
                }

                $avg_location = 0;
                $avg_room = 0;
                $avg_service = 0;
                $avg_cleaness = 0;
                $avg_value = 0;
                $avg_comfort = 0;
                $avg_equipment = 0;
                $avg_hotel = 0;
                $avg_meal = 0;
                foreach ($reviews as $review)
                {
                    $avg_location += $review->location;
                    $avg_room += $review->room;
                    $avg_service += $review->service;
                    $avg_cleaness += $review->cleaness;
                    $avg_value += $review->value;
                    $avg_comfort += $review->comfort;
                    $avg_equipment += $review->equipment;
                    $avg_hotel += $review->hotel;
                    $avg_meal += $review->meal;
                }
                $avg_location /= count($reviews);
                $avg_room /= count($reviews);
                $avg_service /= count($reviews);
                $avg_cleaness /= count($reviews);
                $avg_value /= count($reviews);
                $avg_comfort /= count($reviews);
                $avg_equipment /= count($reviews);
                $avg_hotel /= count($reviews);
                $avg_meal /= count($reviews);
            ?>

            <div class="line3 margtop20"></div>

            <div class="col-md-6 bordertype1 padding20">
                <span class="opensans size30 bold grey2"><?php echo $recommends / count($reviews) * 100 . "%"; ?></span><br/>
                khách<br/>đề xuất
            </div>
            <div class="col-md-6 bordertype2 padding20">
                <span class="opensans size30 bold grey2"><?php echo $hotel->rate; ?></span>/10<br/>
                đánh giá của khách
            </div>

            <div class="col-md-6 bordertype3">
                <?php
                $rate2 = round($rate/2);
                ?>
                <img src="{{asset('images/user-rating-' . $rate2 . '.png')}}" alt=""/><br/>
                <?php echo $hotel->number_of_rate . " đánh giá" ?>
            </div>
            <div class="col-md-6 bordertype3">
                <a href="#reviews" class="grey" id="showreview">+Thêm đánh giá</a>
            </div>
            <div class="clearfix"></div><br/>

            <div class="hpadding20">
                <button class="add2fav margtop5" id="addfavorite" data-hotelid="{{$hotel->id}}" data-userid="{{session('userid')}}">
                    <?php
                        if ($is_fav)
                            echo "Bỏ yêu thích";
                        else
                            echo "Yêu thích";
                    ?>
                </button>
                <a href="#room1" class="booknow margtop20 btnmarg" id="showbook">Đặt phòng</a>
            </div>
        </div>
        <!-- END OF RIGHT INFO -->

    </div>
    <!-- END OF container-->

    <div class="container mt25 offset-0">

        <div class="col-md-8 pagecontainer2 offset-0">
            <div class="cstyle10"></div>

            <ul class="nav nav-tabs" id="myTab">
                <li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#roomrates"><span class="rates"></span><span class="hidetext" id="room1">Các loại phòng</span>&nbsp;</a></li>
                <li onclick="loadScript()" class=""><a data-toggle="tab" href="#maps"><span class="maps"></span><span class="hidetext">Bản đồ</span>&nbsp;</a></li>
                <li onclick="mySelectUpdate(); trigerJslider(); trigerJslider2(); trigerJslider3(); trigerJslider4(); trigerJslider5(); trigerJslider6(); trigerJslider7(); trigerJslider8(); trigerJslider9();" class="" id="showreviews"><a data-toggle="tab" href="#reviews"><span class="reviews"></span><span class="hidetext">Nhận xét</span>&nbsp;</a></li>
            </ul>
            <div class="tab-content4" >

                <!-- TAB 1 -->
                <div id="roomrates" class="tab-pane fade active in">
                    <div class="hpadding20" id="updatediv">
                        <div class="col-md-4 offset-0">
                            <div class="w50percent">
                                <div class="wh90percent textleft">
                                    <span class="opensans size13"><b>Nhận phòng</b></span>
                                    <input type="text" class="form-control mySelectCalendar" id="datepicker" placeholder="mm/dd/yyyy"/>
                                </div>
                            </div>

                            <div class="w50percentlast">
                                <div class="wh90percent textleft right">
                                    <span class="opensans size13"><b>Trả phòng</b></span>
                                    <input type="text" class="form-control mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 offset-0">
                            <div class="col-md-8 ">
                                <div class="room1" >
                                    <div class="w50percent">
                                        <span class="opensans size13"><b>Số phòng</b></span>
                                        <input type="number" name="sophong" id="sophong" class="form-control" min="1" max="10">
                                    </div>
                                    <div class="w50percent">
                                        <span class="opensans size13"><b>Số khách</b></span>
                                        <input type="number" name="sokhach" id="sokhach" class="form-control" min="1" max="40">
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-4 center offset-0 left">
                                <button class="updatebtn caps center margtop20" id="update">Cập nhật</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <br/>

                    <p class="hpadding20 dark">Các loại phòng</p>

                    <div class="line2"></div>

                    @include('roomlist')

                </div>

                <!-- TAB 2 -->
                <div id="maps" class="tab-pane fade">
                    <div class="hpadding20">
                        <div id="map-canvas"></div>
                    </div>
                </div>

                <!-- TAB 3 -->
                <div id="reviews" class="tab-pane fade ">
                    <div class="hpadding20">
                        <div class="col-md-4 offset-0">
                            <span class="opensans dark size60 slim lh3 "><?php echo $rate . " / 10"; ?></span><br/>
                            <img src="{{asset('images/user-rating-' . $rate2 . '.png')}}" alt=""/><br/>
                        </div>
                        <div class="col-md-8 offset-0">
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success wh75percent" role="progressbar" aria-valuenow="<?php echo $rate*10; ?>" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only"><?php echo $rate . " trên 10 điểm" ?></span>
                                </div>
                            </div>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success wh100percent" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only"><?php echo $recommends / count($reviews) * 100 . "% khách đề xuất" ?></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php echo "Đánh giá dựa trên " . count($reviews) . " đánh giá của khách" ?>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <span class="opensans dark size16 bold">Đánh giá trung bình</span>
                    </div>

                    <div class="line4"></div>

                    <div class="hpadding20">
                        <div class="col-md-4 offset-0">
                            <div class="scircle left"><?php echo number_format($avg_location, 1); ?></div>
                            <div class="sctext left margtop15">Vị trí</div>
                            <div class="clearfix"></div>
                            <div class="scircle left"><?php echo number_format($avg_room, 1); ?></div>
                            <div class="sctext left margtop15">Phòng</div>
                            <div class="clearfix"></div>
                            <div class="scircle left"><?php echo number_format($avg_service, 1); ?></div>
                            <div class="sctext left margtop15">Dịch vụ</div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-4 offset-0">
                            <div class="scircle left"><?php echo number_format($avg_cleaness, 1); ?></div>
                            <div class="sctext left margtop15">Vệ sinh</div>
                            <div class="clearfix"></div>
                            <div class="scircle left"><?php echo number_format($avg_value, 1); ?></div>
                            <div class="sctext left margtop15">Đáng giá</div>
                            <div class="clearfix"></div>
                            <div class="scircle left"><?php echo number_format($avg_comfort, 1); ?></div>
                            <div class="sctext left margtop15">Thoải mái</div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-4 offset-0">
                            <div class="scircle left"><?php echo number_format($avg_equipment, 1); ?></div>
                            <div class="sctext left margtop15">Thiết bị</div>
                            <div class="clearfix"></div>
                            <div class="scircle left"><?php echo number_format($avg_hotel, 1); ?></div>
                            <div class="sctext left margtop15">Tòa nhà</div>
                            <div class="clearfix"></div>
                            <div class="scircle left"><?php echo number_format($avg_meal, 1); ?></div>
                            <div class="sctext left margtop15">Đồ ăn</div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>

                        <br/>
                        <span class="opensans dark size16 bold">Đánh giá của khách</span>
                    </div>

                    <div class="line2"></div>
                    @foreach($reviews as $review)
                    <div class="hpadding20" id="oldreviews">
                        <div class="col-md-4 offset-0 center">
                            <div class="padding20">
                                <div class="bordertype5">
                                    <div class="circlewrap">
                                        <img src="{{asset('images/user-avatar.jpg')}}" class="circleimg" alt=""/>
                                        <span><?php echo number_format($review->avg_rating, 1); ?></span>
                                    </div>
                                    <span class="dark"><?php echo $review->name; ?></span><br/>
                                    <?php echo $review->address .", " . $review->district . ", " . $review->city; ?><br/>
                                    <img src="{{asset('images/check.png')}}" alt=""/><br/>
                                    @if($review->avg_rating >= 8)
                                    <span class="green">Đề xuất<br/>cho tất cả mọi người</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8 offset-0">
                            <div class="padding20">
                                <span class="opensans size13 lgrey"><?php echo $review->date; ?></span><br/>
                                <p><?php echo $review->review; ?></p>
                                <ul class="circle-list">
                                    <li><?php echo number_format($review->location, 1); ?></li>
                                    <li><?php echo number_format($review->room, 1); ?></li>
                                    <li><?php echo number_format($review->service, 1); ?></li>
                                    <li><?php echo number_format($review->cleaness, 1); ?></li>
                                    <li><?php echo number_format($review->value, 1); ?></li>
                                    <li><?php echo number_format($review->comfort, 1); ?></li>
                                    <li><?php echo number_format($review->equipment, 1); ?></li>
                                    <li><?php echo number_format($review->hotel, 1); ?></li>
                                    <li><?php echo number_format($review->meal, 1); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="line2"></div>
                    @endforeach

                    <br/>
                    <br/>
                    <div class="hpadding20">
                        <span class="opensans dark size16 bold">Đánh giá của bạn</span>
                    </div>

                    <div class="line2"></div>

                    <div class="wh33percent left center">
                        <ul class="jslidetext">
                            <li>Vị trí</li>
                            <li>Phòng</li>
                            <li>Dịch vụ</li>
                            <li>Vệ sinh</li>
                            <li>Đáng giá</li>
                            <li>Thoải mái</li>
                            <li>Thiết bị</li>
                            <li>Tòa nhà</li>
                            <li>Đồ ăn</li>
                        </ul>

                        <ul class="jslidetext2">
                            <li>Nhận xét</li>
                        </ul>
                    </div>
                    <div class="wh66percent right offset-0">
                        <div class="padding20 relative wh70percent">
                            <div class="layout-slider wh100percent">
                                <span class="cstyle01"><input id="location" type="slider" name="price" value="0;10" /></span>
                            </div>

                            <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="room" type="slider" name="price" value="0;10" /></span>
                            </div>

                            <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="service" type="slider" name="price" value="0;10" /></span>
                            </div>

                            <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="cleaness" type="slider" name="price" value="0;10" /></span>
                            </div>

                            <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="value" type="slider" name="price" value="0;10" /></span>
                            </div>

                            <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="comfort" type="slider" name="price" value="0;10" /></span>
                            </div>

                            <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="equipment" type="slider" name="price" value="0;10" /></span>
                            </div>

                            <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="hotel" type="slider" name="price" value="0;10" /></span>
                            </div>

                            <div class="layout-slider margtop10 wh100percent">
                                <span class="cstyle01"><input id="meal" type="slider" name="price" value="0;10" /></span>
                            </div>

                            <textarea class="form-control margtop10" rows="3" id="comment"></textarea>

                            <div class="clearfix"></div>
                            <button type="submit" class="btn-search4 margtop20" id="addreview" value="<?php echo $hotel->id; ?>">Đánh giá</button>

                            <br/>
                            <br/>
                            <br/>
                            <br/>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>

            </div>
        </div>

        <div class="col-md-4" >

            <div class="pagecontainer2 testimonialbox">
                <div class="cpadding0 mt-10">
                    <span class="icon-quote"></span>
                    <p class="opensans size16 grey2">
                        <?php
                            $rand = rand(0, count($reviews) - 1);
                            $rand_rv = $reviews[$rand];
                            echo $rand_rv->review;
                        ?>
                        <br/>
                        <span class="lato lblue bold size13"><i><?php echo "Nhận xét của " . $rand_rv->name . ", " . $rand_rv->district . ", " . $rand_rv->city; ?></i></span></p>
                </div>
            </div>

            <div class="pagecontainer2 mt20 needassistancebox">
                <div class="cpadding1">
                    <span class="icon-help"></span>
                    <h3 class="opensans">Cần tư vấn?</h3>
                    <p class="size14 grey">Dịch vụ của chúng tôi phục vụ 24/7 để giải đáp các thắc mắc của bạn về việc đặt phòng hay các vấn đề liên quan</p>
                    <p class="opensans size30 lblue xslim">098-443-1825</p>
                </div>
            </div><br/>

            {{--<div class="pagecontainer2 mt20 alsolikebox">--}}
                {{--<div class="cpadding1">--}}
                    {{--<span class="icon-location"></span>--}}
                    {{--<h3 class="opensans">Bạn có thể thích</h3>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<div class="cpadding1 ">--}}
                    {{--<a href="#"><img src="{{asset('images/smallthumb-1.jpg')}}" class="left mr20" alt=""/></a>--}}
                    {{--<a href="#" class="dark"><b>Hotel Amaragua</b></a><br/>--}}
                    {{--<span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br/>--}}
                    {{--<img src="{{asset('images/filter-rating-5.png')}}" alt=""/>--}}
                {{--</div>--}}
                {{--<div class="line5"></div>--}}
                {{--<div class="cpadding1 ">--}}
                    {{--<a href="#"><img src="{{asset('images/smallthumb-2.jpg')}}" class="left mr20" alt=""/></a>--}}
                    {{--<a href="#" class="dark"><b>Hotel Amaragua</b></a><br/>--}}
                    {{--<span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br/>--}}
                    {{--<img src="{{asset('images/filter-rating-5.png')}}" alt=""/>--}}
                {{--</div>--}}
                {{--<div class="line5"></div>--}}
                {{--<div class="cpadding1 ">--}}
                    {{--<a href="#"><img src="{{asset('images/smallthumb-3.jpg')}}" class="left mr20" alt=""/></a>--}}
                    {{--<a href="#" class="dark"><b>Hotel Amaragua</b></a><br/>--}}
                    {{--<span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br/>--}}
                    {{--<img src="{{asset('images/filter-rating-5.png')}}" alt=""/>--}}
                {{--</div>--}}
                {{--<br/>--}}


            {{--</div>--}}

        </div>
    </div>



</div>
<!-- END OF CONTENT -->

@include('layouts.footer2')

<!-- Javascript -->
<script src="{{asset('assets/js/js-details.js')}}"></script>

<!-- Googlemap -->
<script src="{{asset('assets/js/initialize-google-map.js')}}"></script>

<!-- Custom Select -->
<script type='text/javascript' src='{{asset('assets/js/jquery.customSelect.js')}}'></script>

<!-- Custom functions -->
<script src="{{asset('assets/js/functions.js')}}"></script>

<!-- Nicescroll  -->
<script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>

<!-- jQuery KenBurn Slider  -->
<script type="text/javascript" src="{{asset('rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- CarouFredSel -->
<script src="{{asset('assets/js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>
<script src="{{asset('assets/js/helper-plugins/jquery.touchSwipe.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/helper-plugins/jquery.mousewheel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/helper-plugins/jquery.transit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js')}}"></script>

<!-- Counter -->
<script src="{{asset('assets/js/counter.js')}}"></script>

<!-- Carousel-->
<script src="{{asset('assets/js/initialize-carousel-detailspage.js')}}"></script>

<!-- Js Easing-->
<script src="{{asset('assets/js/jquery.easing.js')}}"></script>


<!-- Bootstrap-->
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>

<!-- app js -->
<script type="text/javascript" src="{{asset('js/show.js')}}"></script>
<script type="text/javascript" src="{{asset('js/addreview.js')}}"></script>
<script type="text/javascript" src="{{asset('js/updateroom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/addfavorite.js')}}"></script>

</body>
</html>
