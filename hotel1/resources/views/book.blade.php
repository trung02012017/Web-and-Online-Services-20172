<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt phòng</title>
    <!-- Bootstrap -->
    <link href="{{asset('dist/css/bootstrap.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" media="screen">
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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}" media="screen"/>
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
    <!-- Animo css-->
    <link href="{{asset('plugins/animo/animate+animo.css')}}" rel="stylesheet" media="screen">
    <!-- Picker -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}"/>
    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery.v2.0.3.js')}}"></script>
</head>
<body id="top" class="thebg">

@include('layouts.header')

<div class="container breadcrub">
    <div>
        <a class="homebtn left" href="#"></a>
        <div class="left">
            <ul class="bcrumbs">
                <li>/</li>
                <li>
                    <a href="#">Đặt phòng</a>
                </li>
                <li>/</li>
                <li>
                    <a href="#"><?php echo $hotel->name; ?></a>
                </li>
                <li>/</li>
            </ul>
        </div>
        <a class="backbtn right" href="#"></a>
    </div>
    <div class="clearfix"></div>
    <div class="brlines"></div>
</div>
<!-- CONTENT -->
<div class="container">
    <div class="container mt25 offset-0">
        <!-- LEFT CONTENT -->
        <div class="col-md-8 pagecontainer2 offset-0">
            <div class="padding30 grey">

                <div class="padding20">
                    <div class="col-md-4 offset-0">
                        <a href="#">
                            @if ($room->img)
                                <img src="{{asset('images/' . $room->img)}}" alt="" class="fwimg"/>
                            @else
                                <img src="{{asset('images/hotel/loading.png')}}" alt="" class="fwimg"/>
                            @endif
                        </a>
                    </div>
                    <div class="col-md-8 offset-0">
                        <div class="col-md-8 mediafix1">
                            <h4 class="opensans dark bold margtop1 lh1"><?php echo $room->quality ?></h4>
                            <?php echo "Sức chứa: " . $room->capacity . " người" ?>
                            </br>
                            <?php echo $room->type_of_bed; ?>
                            <ul class="hotelpreferences2">
                                @if($room->internet)
                                    <li class="icohp-internet"></li>
                                @endif
                                @if($room->air)
                                    <li class="icohp-air"></li>
                                @endif
                                @if($room->hairdryer)
                                    <li class="icohp-hairdryer"></li>
                                @endif
                                @if($room->tv)
                                    <li class="icohp-tv"></li>
                                @endif
                                @if($room->fridge)
                                    <li class="icohp-fridge"></li>
                                @endif
                                @if($room->microwave)
                                    <li class="icohp-microwave"></li>
                                @endif
                                @if($room->roomservice)
                                    <li class="icohp-roomservice"></li>
                                @endif
                            </ul>
                            <div class="clearfix"></div>
                            <ul class="checklist2 margtop10">
                                @if($room->cancellation)
                                    <li>Có thể hoàn hủy</li>
                                @endif
                                @if($room->breakfast)
                                    <li>Bao gồm bữa sáng</li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-4 center bordertype4">
                            <span class="opensans green size24"><?php echo number_format($room->price_per_night, 0, '.', ',') . " đ"; ?></span><br/>
                            <span class="opensans lightgrey size12">giá / 1 đêm</span><br/><br/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="line2"></div>

                {{--<script type="text/javascript"src="http://202.9.84.88/documents/payment/logoscript.jsp?logos=v,m,a,j,u,at&lang=en"></script>--}}
                <form action="{{url('/book/sendrequest')}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="Title" value="VPC 3-Party" />
                    <input type="hidden" name="virtualPaymentClientURL" size="63" value="https://mtf.onepay.vn/onecomm-pay/vpc.op" maxlength="250" />
                    <input type="hidden" name="vpc_Merchant" value="ONEPAY" size="20" maxlength="16" />
                    <input type="hidden" name="vpc_AccessCode" value="D67342C2" size="20" maxlength="8" />
                    <input type="hidden" name="vpc_MerchTxnRef" value="<?php echo date ( 'YmdHis' ) . rand (); ?>" size="40" maxlength="40" />
                    <input type="hidden" name="vpc_OrderInfo" value="{{$book_id}}" size="20" maxlength="34" />
                    <input type="hidden" name="vpc_Amount" value="{{$room->price_per_night * $days * 100}}" size="20" maxlength="10" />
                    <input type="hidden" name="vpc_ReturnURL" size="60" value="{{url('/book/getresponse')}}" maxlength="300" />
                    <input type="hidden" name="vpc_Version" value="2" size="20" maxlength="8" />
                    <input type="hidden" name="vpc_Command" value="pay" size="20" maxlength="16" />
                    <input type="hidden" name="vpc_Locale" value="vn" size="20" maxlength="5" />
                    <input type="hidden" name="vpc_Currency" value="VND" size="20" maxlength="5" />
                    <input type="hidden" name="vpc_TicketNo" maxlength="15" value="<?php echo $_SERVER ['REMOTE_ADDR']; ?>" />
                    <input type="hidden" name="vpc_SHIP_Street01" value="{{$user->address}}" size="20" maxlength="500" />
                    <input type="hidden" name="vpc_SHIP_Provice" value="{{$user->district}}" size="20" maxlength="50" />
                    <input type="hidden" name="vpc_SHIP_City" value="{{$user->city}}" size="20" maxlength="50" />
                    <input type="hidden" name="vpc_SHIP_Country" value="Viet Nam" size="20" maxlength="50" />
                    <input type="hidden" name="vpc_Customer_Phone" value="{{$user->phone}}" size="20" maxlength="50" />
                    <input type="hidden" name="vpc_Customer_Email" size="20" value="{{$user->phone}}" maxlength="50" />
                    <input type="hidden" name="vpc_Customer_Id" value="{{$user->username}}" size="20" maxlength="50" />
                    <script type="text/javascript" src="http://202.9.84.88/documents/payment/logoscript.jsp?logos=v,m&lang=vn"></script>
                    <input type="submit" class="booknow margtop20 btnmarg"	value="Đặt phòng ngay với onepay" />
                </form>
            </div>
        </div>
        <!-- END OF LEFT CONTENT -->
        <!-- RIGHT CONTENT -->
        <div class="col-md-4">
            <div class="pagecontainer2 paymentbox grey">
                <div class="padding30">
                    <img src="{{asset('images/' . $hotel->img_folder . "/main.jpg")}}" class="left margright20" width="71px" height="71px" alt=""/>
                    <span class="opensans size18 dark bold">{{$hotel->name}}</span>
                    <br/>
                    <span class="opensans size13 grey"><?php echo $hotel->city . ", Việt Nam"; ?></span>
                    <br/>
                    <img src="{{asset('images/filter-rating-' . $hotel->stars . '.png')}}" width="60" alt=""/>

                </div>
                <div class="line3"></div>
                <div class="hpadding30 margtop30">
                    <table class="table table-bordered margbottom20">
                        <tr>
                            <td>Đánh giá của khách</td>
                            <td class="center green bold"><?php echo $hotel->rate; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "Số lượt đánh gía"; ?></td>
                            <td class="center green bold"><?php echo $hotel->number_of_rate; ?></td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <span class="dark">Phòng: </span>
                                <?php echo $room->quality; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <span class="dark"><?php echo $days . " đêm: " ?></span>
                                <?php echo session('checkin') . " đến " . session('checkout'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="dark">Phòng: </span>
                                <?php echo $room->capacity . " người"; ?><br/>
                                {{--5 Nights--}}

                                {{--<!-- Collapse 1 -->--}}
                                {{--<button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse" data-target="#collapse1"></button>--}}
                                {{--<div id="collapse1" class="collapse">--}}
                                    {{--<div class="left size12 lblue">--}}
                                        {{--Thu Nov 14<br/>Fri Nov 15--}}

                                    {{--</div>--}}
                                    {{--<div class="right size12 lblue">--}}
                                        {{--$15.92<br/>$20.00--}}

                                    {{--</div>--}}
                                    {{--<div class="clearfix"></div>--}}
                                {{--</div>--}}
                                <!-- End of collapse 1 -->
                                {{--<div class="clearfix"></div>--}}
                                {{--Taxes &Fees per night--}}


                                {{--<!-- Collapse 1 -->--}}
                                {{--<button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse" data-target="#collapse2"></button>--}}
                                {{--<div id="collapse2" class="collapse">--}}
                                    {{--<div class="left size12 lred">--}}
                                        {{--Thu Nov 14<br/>Fri Nov 15--}}

                                    {{--</div>--}}
                                    {{--<div class="right size12 lred">--}}
                                        {{--$1.51<br/>$1.00--}}

                                    {{--</div>--}}
                                    {{--<div class="clearfix"></div>--}}
                                {{--</div>--}}
                                <!-- End of collapse 1 -->
                                <div class="clearfix"></div>
                            </td>
                            <td class="center">
                                số tiền / đêm<br/>
                                <?php echo number_format($room->price_per_night, 0, '.', ',') . " VNĐ"; ?><br/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="line3"></div>
                <div class="padding30">
                    <span class="left size14 dark">Tổng cộng:</span>
                    <span class="right lred2 bold size18"><?php echo number_format($room->price_per_night * $days, 0, '.', ',')  . "VNĐ"; ?></span>
                    <div class="clearfix"></div>
                </div>
            </div>
            <br/>
            <div class="pagecontainer2 mt20 needassistancebox">
                <div class="cpadding1">
                    <span class="icon-help"></span>
                    <h3 class="opensans">Cần tư vấn?</h3>
                    <p class="size14 grey">Dịch vụ của chúng tôi phục vụ 24/7 để giải đáp các thắc mắc của bạn về việc đặt phòng hay các vấn đề liên quan</p>
                    <p class="opensans size30 lblue xslim">098-443-1825</p>
                </div>
            </div>
            <br/>

            <br/>
        </div>
        <!-- END OF RIGHT CONTENT -->
    </div>
</div>
<!-- END OF CONTENT -->
<!-- FOOTER -->
@include('layouts.footer2')

<!-- Javascript  -->
<script src="{{asset('assets/js/js-payment.js')}}"></script>
<!-- Nicescroll  -->
<script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
<!-- Custom functions -->
<script src="{{asset('assets/js/functions.js')}}"></script>
<!-- Custom Select -->
<script type='text/javascript' src='{{asset('assets/js/jquery.customSelect.js')}}'></script>
<!-- Load Animo -->
<script src="{{asset('plugins/animo/animo.js')}}"></script>
<!-- Picker -->
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<!-- Picker -->
<script src="{{asset('assets/js/jquery.easing.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
</body>
</html>
