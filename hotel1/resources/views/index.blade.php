<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang chủ</title>

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

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery.v2.0.3.js')}}"></script>



  </head>
  <body id="top">

	@include('layouts.header')


	<!--
	#################################
		- THEMEPUNCH BANNER -
	#################################
	-->
	<div id="dajy" class="fullscreen-container mtslide sliderbg fixed">
			<div class="fullscreenbanner">
				<ul>
					<li data-transition="fade" data-slotamount="1" data-masterspeed="300">
						<a href="{{url('hotel/Hà Nội')}}"><img src="{{asset('images/slider/hanoi.jpg')}}" width="1920" height="769" alt=""/></a>
						<div class="tp-caption scrolleffect sft"
							 data-x="center"
							 data-y="120"
							 data-speed="1000"
							 data-start="800"
							 data-easing="easeOutExpo"  >
							 <div class="sboxpurple textcenter">
								<span class="lato size100 slim caps white">Hà Nội</span><br/>
							 </div>
						</div>
					</li>

					<li data-transition="fade" data-slotamount="1" data-masterspeed="300">
						<a href="{{url('hotel/Đà Nẵng')}}"><img src="{{asset('images/slider/danang.jpg')}}" width="1920" height="769" alt=""/></a>
						<div class="tp-caption scrolleffect sft"
							 data-x="center"
							 data-y="120"
							 data-speed="1000"
							 data-start="800"
							 data-easing="easeOutExpo">
							 <div class="sboxpurple textcenter">
								<span class="lato size100 slim caps white">Đà Nẵng</span><br/>
							 </div>
						</div>
					</li>

					<li data-transition="fade" data-slotamount="1" data-masterspeed="300">
						<a href="{{url('hotel/Hồ Chí Minh')}}"><img src="{{asset('images/slider/hcm.jpg')}}" width="1920" height="769" alt=""/></a>
						<div class="tp-caption scrolleffect sft"
							 data-x="center"
							 data-y="120"
							 data-speed="1000"
							 data-start="800"
							 data-easing="easeOutExpo">
							 <div class="sboxpurple textcenter">
								<span class="lato size100 slim caps white">TP. Hồ Chí Minh</span><br/>
							 </div>
						</div>
					</li>


				</ul>
				<div class="tp-bannertimer none"></div>
			</div>
		</div>

		<!--
		##############################
		 - ACTIVATE THE BANNER HERE -
		##############################
		-->
		<script type="text/javascript">

			var tpj=jQuery;
			tpj.noConflict();

			tpj(document).ready(function() {

			if (tpj.fn.cssOriginal!=undefined)
				tpj.fn.css = tpj.fn.cssOriginal;

				tpj('.fullscreenbanner').revolution(
					{
						delay:9000,
						startwidth:1170,
						startheight:600,

						onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

						thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
						thumbHeight:50,
						thumbAmount:3,

						hideThumbs:0,
						navigationType:"bullet",				// bullet, thumb, none
						navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

						navigationStyle:false,				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


						navigationHAlign:"left",				// Vertical Align top,center,bottom
						navigationVAlign:"bottom",					// Horizontal Align left,center,right
						navigationHOffset:30,
						navigationVOffset:30,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,

						touchenabled:"on",						// Enable Swipe Function : on/off


						stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
						stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

						hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
						hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
						hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


						fullWidth:"on",							// Same time only Enable FullScreen of FullWidth !!
						fullScreen:"off",						// Same time only Enable FullScreen of FullWidth !!


						shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

					});


		});
		</script>






	<!-- WRAP -->
	<div class="wrap cstyle03">
		<form action="{{url('/hotel/search')}}" method="get">
		<div class="container mt-130 z-index100">
		  <div class="row">
			<div class="col-md-12">
				<div class="bs-example bs-example-tabs cstyle04">

					<ul class="nav nav-tabs" id="myTab">
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#hotel2"><span class="hotel"></span><span class="hidetext">Khách sạn</span>&nbsp;</a></li>
					</ul>

					<div class="tab-content2" id="myTabContent">

						<div id="hotel2" class="tab-pane fade active in">

							<div class="col-md-4 pt-6">
								<span class="opensans size18" >Bạn muốn đi đâu?</span>
								<input type="text" name="city" class="form-control" placeholder="vd: Đà Nẵng">
							</div>

							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Ngày nhận phòng</b></span>
										<input type="text" name="checkin" class="form-control mySelectCalendar" id="datepicker" placeholder="mm/dd/yyyy"/>
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>Ngày trả phòng</b></span>
										<input type="text" name="checkout" class="form-control mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy"/>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="room1" >
									<div class="w50percent">
										<div class="wh90percent textleft">
                                            <div class="w50percent">
                                                <div class="wh90percent textleft left">
                                                    <span class="opensans size13"><b>Số phòng</b></span>
                                                    {{--<select class="form-control mySelectBoxClass">--}}
                                                        {{--<option>1</option>--}}
                                                        {{--<option selected>2</option>--}}
                                                        {{--<option>3</option>--}}
                                                        {{--<option>4</option>--}}
                                                        {{--<option>5</option>--}}
                                                    {{--</select>--}}
													<input type="number" name="sophong" class="form-control" min="1" max="10">
                                                </div>
                                            </div>
										</div>
									</div>

									<div class="w50percentlast">
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Số khách</b></span>
													{{--<select class="form-control mySelectBoxClass">--}}
													  {{--<option>1</option>--}}
													  {{--<option selected>2</option>--}}
													  {{--<option>3</option>--}}
													  {{--<option>4</option>--}}
													  {{--<option>5</option>--}}
													{{--</select>--}}
													<input type="number" name="sokhach" class="form-control" min="1" max="40">
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>


						</div>
					</div>

					<div class="searchbg2">
						{{--<form action="list4.html">--}}
							<input type="submit" class="btn-search right mr30" value="Tìm kiếm">
						{{--</form>--}}
					</div>

				</div>
			</div>

		  </div>
		</div>
		</form>

		<div class="lastminute2 lcfix">
			<div class="container lmc">
				<img src="{{asset('images/rating-4.png')}}" alt=""/><br/>
				<b>Travel</b> - Website đặt phòng trực tuyến số 1 Việt Nam<br/>
				<form action="list4.html">
					<button class="btn iosbtn" type="submit">Tìm hiểu thêm</button>
				</form>
			</div>
		</div>

    @include('layouts.footer1')

	</div>
    <!-- /WRAP -->



    <!-- Javascript -->

    <!-- This page JS -->
	<script src="{{asset('assets/js/js-index3.js')}}"></script>

    <!-- Custom functions -->
    <script src="{{asset('assets/js/functions.js')}}"></script>

    <!-- Picker UI-->
	<script src="{{asset('assets/js/jquery-ui.js')}}"></script>

	<!-- Easing -->
    <script src="{{asset('assets/js/jquery.easing.js')}}"></script>

    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="{{asset('rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

   <!-- Nicescroll  -->
	<script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>

    <!-- CarouFredSel -->
    <script src="{{asset('assets/js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>
    <script src="{{asset('assets/js/helper-plugins/jquery.touchSwipe.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/helper-plugins/jquery.mousewheel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/helper-plugins/jquery.transit.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js')}}"></script>

    <!-- Custom Select -->
	<script type='text/javascript' src='{{asset('assets/js/jquery.customSelect.js')}}'></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
  </body>
</html>
