<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Thông tin tài khoản</title>

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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->

    <!-- Animo css-->
    <link href="{{asset('plugins/animo/animate+animo.css')}}" rel="stylesheet" media="screen">

    <!-- Picker -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}" />

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

    <script type="text/javascript" src="{{asset('js/updateprofile.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/deletefavorite.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/changepassword.js')}}"></script>

</head>
<body id="top" class="thebg" >

@include('layouts.header')

<?php
    $user = $profile["user"];
    $booked_rooms = $profile["booked_rooms"];
    $favorite_hotels = $profile["favorite_hotels"];
?>

<div class="container breadcrub">
    <div>
        <a class="homebtn left" href="{{url('')}}"></a>
        <div class="left">
            <ul class="bcrumbs">
                <li>/</li>
                <li><a href="#" class="active">Profile</a></li>
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


        <!-- CONTENT -->
        <div class="col-md-12 pagecontainer2 offset-0">

            <!-- LEFT MENU -->
            <div class="col-md-1 offset-0">
                <!-- Nav tabs -->
                <ul class="nav profile-tabs">
                    <li class="active">
                        <a href="#profile" data-toggle="tab">
                            <span class="profile-icon"></span>
                            Tài khoản
                        </a></li>
                    <li>
                        <a href="#bookings" data-toggle="tab" onclick="mySelectUpdate()">
                            <span class="bookings-icon"></span>
                            Danh sách đặt phòng
                        </a></li>
                    <li>
                        <a href="#wishlist" data-toggle="tab" onclick="mySelectUpdate()">
                            <span class="wishlist-icon"></span>
                            Danh sách yêu thích
                        </a></li>
                    <li>
                        <a href="#password" data-toggle="tab" onclick="mySelectUpdate()">
                            <span class="password-icon"></span>
                            Đổi mật khẩu
                        </a></li>
                    <!-- <li>
                        <a href="#newsletter" data-toggle="tab" onclick="mySelectUpdate()">
                        <span class="newsletter-icon"></span>
                        Newsletters
                        </a></li> -->
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- LEFT MENU -->

            <!-- RIGHT CPNTENT -->
            <div class="col-md-11 offset-0">
                <!-- Tab panes from left menu -->
                <div class="tab-content5">

                    <!-- TAB 1 -->
                    <div class="tab-pane padding40 active" id="profile">

                        <!-- Admin top -->
                        <div class="col-md-4 offset-0">
                            <img src="{{asset('images/users/' . $user->avatar)}}" width="60px" height="60px" alt="" class="left margright20"/>
                            <p class="size12 grey margtop10">
                                Xin chào <span class="lred">{{$user->name}}</span><br/>
                                <a href="#" class="lblue">Thay ảnh đại diện</a>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <!-- <div class="col-md-4 offset-0">
                          <table class="table table-bordered  mt-10">
                          <tr class="grey opensans">
                              <td class="center"><span class="size30 slim lh4">2</span><br/><span class="size12">Trips</span></td>
                              <td class="center"><span class="size30 slim lh4">5</span><br/><span class="size12">Places</span></td>
                              <td class="center"><span class="size30 slim lh4">14</span><br/><span class="size12">Days away</span></td>
                              <td class="center"><span class="size30 slim lh4">3</span><br/><span class="size12">Countries</span></td>
                          </tr>
                          </table>
                        </div> -->
                        <!-- End of Admin top -->


                        <div class="clearfix"></div>

                        <span class="size16 bold">Thông tin cá nhân</span>
                        <div class="line2"></div>


                        <!-- COL 1 -->
                        <div class="col-md-12 offset-0">
                            <table>
                                <tr>
                                    <td>
                                        <div class="radio left">
                                            <label>
                                                @if($user->sex == 2)
                                                <input type="radio" name="optionsRadios" id="ms" value="option1" checked>
                                                @else
                                                    <input type="radio" name="optionsRadios" id="ms" value="option2">
                                                @endif
                                                Nữ
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                @if($user->sex == 1)
                                                <input type="radio" name="optionsRadios" id="mr" value="option2" checked>
                                                @else
                                                    <input type="radio" name="optionsRadios" id="mr" value="option2">
                                                @endif
                                                Nam
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio">
                                            <label>
                                                @if($user->sex == 3)
                                                <input type="radio" name="optionsRadios" id="neither" value="option3" checked>
                                                @else
                                                    <input type="radio" name="optionsRadios" id="neither" value="option3">
                                                @endif
                                                Khác
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>


                            <br/>
                            Tên*:
                            <input type="text" class="form-control" value="{{$user->name}}" rel="popover" id="name" data-content="Không được bỏ trống mục này" data-original-title="Tên của bạn">
                            <br/>
                            Tên đăng nhập*:
                            <input type="text" class="form-control" value="{{$user->username}}" rel="popover" id="username" data-content="Không được bỏ trống mục này" data-original-title="Tên đăng nhập của bạn">
                            <br/>
                            E-mail*:
                            <input type="text" class="form-control" value="{{$user->email}}" id="email" data-content="Không được bỏ trống mục này" data-original-title="Email của bạn">
                            <br/>
                            Số điện thoại:
                            <input type="text" class="form-control" id="phone" value="{{$user->phone}}" data-content="Không được bỏ trống mục này" data-original-title="Số điện thoại của bạn">

                            <br/>
                            Ngày sinh:<br/>
                            <input type="text" class="form-control mySelectCalendar" id="datepicker" value="{{$user->birth_date}}" data-content="Không được bỏ trống mục này" data-original-title="Ngày sinh của bạn"/>


                            <br/>
                            <br/>
                            <span class="size16 bold">Địa chỉ của bạn</span>
                            <div class="line2"></div>

                            <br/>
                            Địa chỉ*:
                            <input type="text" class="form-control" id="address" value="{{$user->address}}" data-content="Không được bỏ trống mục này" data-original-title="Địa chỉ nơi ở">

                            <br/>
                            Thành phố*:
                            <input type="text" class="form-control" id="city" value="{{$user->city}}" data-content="Không được bỏ trống mục này" data-original-title="Thành phố">

                            <br/>
                            Quận/Huyện*:
                            <input type="text" class="form-control" id="district" value="{{$user->district}}" data-content="Không được bỏ trống mục này" data-original-title="Quận / Huyện">

                            <button type="submit" class="bluebtn margtop15" id="updateprofile" value="{{$user->id}}">Cập nhật</button>
                        </div>
                        <!-- END OF COL 1 -->

                        <div class="clearfix"></div><br/><br/><br/>

                    </div>
                    <!-- END OF TAB 1 -->

                    <!-- TAB 2 -->
                    <div class="tab-pane" id="bookings">
                        <div class="padding40">

                            <span class="dark size18">Những lần đặt phòng gần nhất của bạn</span>

                            <div class="line4"></div>
                            <br/>
                            @foreach($booked_rooms as $room)
                            <div class="col-md-4 offset-0">
                                <a href="{{url('/hotel/detail/' . $room->hotel_id)}}"><img alt="" class="left mr20" src="{{asset('images/' . $room->img_folder . "/main.jpg")}}" width="96px" height="61px"></a>
                                <a class="dark" href="{{url('/hotel/detail/' . $room->hotel_id)}}"><b>{{$room->name}}</b></a> /
                                <span class="dark size12">{{$room->quality}}</span><br>
                                <img alt="" src="{{asset('images/filter-rating-' . $room->stars . '.png')}}"><br/>
                                <span class="opensans green bold size14">{{number_format($room->price_per_night, 0, '.', ',') . " VNĐ"}}</span> <span class="grey"> / đêm</span><br>
                            </div>
                            <div class="col-md-7">
                                <span class="grey"><?php if(strlen($room->description) > 300) echo substr($room->description, 0, 300) . '...';
                                    else echo $room->description; ?></span>
                            </div>
                            <div class="col-md-1 offset-0">
                                <a href="{{url('hotel/detail/' . $room->hotel_id)}}"><button type="submit" class="btn-search4 right">Xem</button></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="line4"></div>
                            @endforeach

                        </div>
                    </div>
                    <!-- END OF TAB 2 -->

                    <!-- TAB 3 -->
                    <div class="tab-pane" id="wishlist">
                        <div class="padding40">


                            <span class="dark size18">Khách sạn yêu thích</span>
                            <div class="line4"></div>
                            <br/>

                            @foreach($favorite_hotels as $ht)
                            <div>
                                <div class="col-md-4 offset-0">
                                    <a href="{{url('/hotel/detail/' . $ht->hotel_id)}}"><img alt="" class="left mr20" src="{{asset('images/' . $ht->img_folder . "/main.jpg")}}" width="96px" height="61px"></a>
                                    <a class="dark" href="{{url('/hotel/detail/' . $ht->hotel_id)}}"><b>{{$ht->name}}</b></a> /
                                    <span class="dark size12">{{$ht->address}}</span><br>
                                    <span class="opensans green bold size14">{{"Từ " . number_format($ht->lowest_price, 0, '.', ',') . " VNĐ"}}</span> <span class="grey"> / đêm</span><br>
                                    <img alt="" src="{{asset('images/filter-rating-' . $ht->stars . '.png')}}"><br/>
                                </div>
                                <div class="col-md-7">
                                    <span class="grey"><?php if(strlen($ht->description) > 300) echo substr($ht->description, 0, 300) . '...';
                                        else echo $ht->description; ?></span>
                                </div>
                                <div class="col-md-1 offset-0">
                                    <a href="{{url('hotel/detail/' . $ht->id)}}"><button type="submit" class="btn-search4 right">Xem</button></a>
                                </div>
                                <button aria-hidden="true" data-dismiss="alert" class="close mr20 mt15" type="button" value="{{$ht->id}}">×</button>
                                <div class="clearfix"></div>
                                <div class="line6"></div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- END OF TAB 3 -->

                    <!-- TAB 4 -->
                    <!-- END OF TAB 4 -->

                    <!-- TAB 5 -->

                    <!-- END OF TAB 5 -->

                    <!-- TAB 6 -->
                    <div class="tab-pane" id="password">
                        <div class="padding40">

                            <span class="dark size18">Đổi mật khẩu</span>
                            <div class="line4"></div>

                            {{--Tên đăng nhập--}}
                            {{--<br/>--}}
                            {{--<input type="text" class="form-control " id="username" placeholder="">--}}
                            {{--<br/>--}}
                            Mật khẩu cũ
                            <br/>
                            <input type="password" class="form-control " id="oldpassword" placeholder="">
                            <br/>
                            Mật khẩu mới
                            <br/>
                            <input type="password" class="form-control " id="newpassword" placeholder="">
                            <br/>
                            Xác nhận lại mật khẩu mới
                            <br/>
                            <input type="password" class="form-control " id="newpassword2" placeholder="">
                            <br/>
                            <button type="submit" class="btn-search5" id="changepassword">Lưu thay đổi</button>

                            <br/>
                            <br/>
                            <br/>
                            {{--<span class="dark size18">Security</span>--}}
                            {{--<div class="line4"></div>--}}

                            {{--What is your father's middle name?--}}
                            {{--<input type="password" class="form-control " placeholder="●●●●●●●●●">--}}

                            {{--<br/>--}}
                            {{--Please choose a security question<br/>--}}
                            {{--<select class="form-control mySelectBoxClass hasCustomSelect cpwidth3">--}}
                                {{--<option value="">What is your father's middle name?</option>--}}
                                {{--<option value="">What was the name of your first pet</option>--}}
                                {{--<option value="">What was your first telephone number</option>--}}
                            {{--</select>--}}

                            {{--<br/>--}}
                            {{--<br/>--}}
                            {{--Please enter an answer<br/>--}}
                            {{--<input type="text" class="form-control " placeholder="">--}}

                            {{--<br/>--}}
                            {{--Please confirm your answer<br/>--}}
                            {{--<input type="text" class="form-control " placeholder="">--}}
                            {{--<br/>--}}
                            {{--<button type="submit" class="btn-search5">Save changes</button>--}}

                        </div>
                    </div>
                    <!-- END OF TAB 6 -->

                    <!-- TAB 7 -->
                    <!-- <div class="tab-pane" id="newsletter">
                      <div class="padding40">

                          <span class="dark size18">Newsletter</span>
                          <div class="line4"></div>

                          <div class="checkbox dark">
                            <label>
                              <input type="checkbox" checked> Check this box to receive a monthly newsletter
                            </label>
                          </div>

                          <br/>
                          <button type="submit" class="btn-search5">Save changes</button>

                      </div>
                    </div> -->
                    <!-- END OF TAB 7 -->




                </div>
                <!-- End of Tab panes from left menu -->

            </div>
            <!-- END OF RIGHT CPNTENT -->

            <div class="clearfix"></div><br/><br/>
        </div>
        <!-- END CONTENT -->



    </div>


</div>
<!-- END OF CONTENT -->




<!-- FOOTER -->

@include('layouts.footer2')


<!-- Javascript  -->
<script src="{{asset('assets/js/js-profile.js')}}"></script>

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
