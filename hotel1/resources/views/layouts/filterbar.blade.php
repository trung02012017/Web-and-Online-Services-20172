<!-- FILTERS -->
<div class="col-md-3 filters offset-0" id="filter">


    <!-- TOP TIP -->
    <div class="filtertip">
        <div class="padding20">
            <p class="size13"><span class="size18 bold"><?php if($ds_hotel) echo count($ds_hotel); ?></span> khách sạn bắt đầu từ</p>
            <?php
                if($ds_hotel)
                {
                    $min = 100000000;
                    foreach ($ds_hotel as $hotel)
                    {
                        if($hotel->lowest_price < $min)
                            $min = $hotel->lowest_price;
                    }
                }
            ?>
            <p class="size30 bold"><?php echo number_format($min, 0, '.', ',') . " đ";?></p>
            <p class="size13">Bạn có thể lọc các khách sạn theo ý mình</p>
        </div>
        <div class="tip-arrow"></div>
    </div>





    <div class="bookfilters hpadding20">
        <div class="clearfix"></div><br/>
        <!-- HOTELS TAB -->
        <form action="{{url('/hotel/search')}}" method="get">
        <div class="hotelstab2 none">
            <span class="opensans size13">Bạn muốn đi đâu?</span>
            <input type="text" name="city" class="form-control" placeholder="vd: Hà Nội">

            <div class="clearfix pbottom15"></div>

            <div class="w50percent">
                <div class="wh90percent textleft">
                    <span class="opensans size13">Nhận phòng</span>
                    <input type="text" name="checkin" class="form-control mySelectCalendar" id="datepicker" placeholder="mm/dd/yyyy"/>
                </div>
            </div>

            <div class="w50percentlast">
                <div class="wh90percent textleft right">
                    <span class="opensans size13">Trả phòng</span>
                    <input type="text" name="checkout" class="form-control mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy"/>
                </div>
            </div>

            <div class="clearfix pbottom15"></div>

            <div class="room1" >
                <div class="wh90percent textleft right ohidden">
                    <div class="w50percent">
                        <div class="wh90percent textleft left">
                            <span class="opensans size13">Số phòng</span>
                            <input type="number" name="sophong" class="form-control" min="1" max="10">
                        </div>
                    </div>
                    <div class="w50percentlast">
                        <div class="wh90percent textleft right ohidden">
                            <span class="opensans size13">Số khách</span>
                            <input type="number" name="sokhach" class="form-control" min="1" max="40">
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <input type="submit" class="btn-search3" value="Tìm kiếm"></input>
        </div>
        </form>
        <!-- END OF HOTELS TAB -->
    </div>
    <!-- END OF BOOK FILTERS -->

    <div class="line2"></div>

    <div class="padding20title"><h3 class="opensans dark">Lọc theo</h3></div>
    <div class="line2"></div>

    <!-- Star ratings -->
    <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse1">
        Hạng khách sạn <span class="collapsearrow"></span>
    </button>

    <div id="collapse1" class="collapse in">
        <div class="hpadding20">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="stars[]" value="5"><img src="{{asset('images/filter-rating-5.png')}}" class="imgpos1" alt=""/> 5 sao
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="stars[]" value="4"><img src="{{asset('images/filter-rating-4.png')}}" class="imgpos1" alt=""/> 4 sao
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="stars[]" value="3"><img src="{{asset('images/filter-rating-3.png')}}" class="imgpos1" alt=""/> 3 sao
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="stars[]" value="2"><img src="{{asset('images/filter-rating-2.png')}}" class="imgpos1" alt=""/> 2 sao
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="stars[]" value="1"><img src="{{asset('images/filter-rating-1.png')}}" class="imgpos1" alt=""/> 1 sao
                </label>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- End of Star ratings -->

    <div class="line2"></div>

    <!-- Price range -->
    <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">
        Khoảng giá <span class="collapsearrow"></span>
    </button>

    <div id="collapse2" class="collapse in">
        <div class="padding20">
            <div class="layout-slider wh100percent">
                <span class="cstyle09"><input id="price" type="slider" name="price" value="0;10000000" /></span>
            </div>
            <script type="text/javascript" >
                jQuery("#price").slider({ from: 0, to: 10000000, step: 100000, smooth: true, round: 0, dimension: "&nbsp;đ", skin: "round" });
            </script>
        </div>
    </div>
    <!-- End of Price range -->

    <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse">
        Khoảng cách tới trung tâm <span class="collapsearrow"></span>
    </button>

    <div id="collapse2" class="collapse in">
        <div class="padding20">
            <div class="layout-slider wh100percent" id="dis">
                <span class="cstyle09"><input id="distance" type="slider" name="distance" value="0;10" /></span>
            </div>
            <script type="text/javascript" >
                jQuery("#distance").slider({ from: 0, to: 10, step: 1, smooth: true, round: 0, dimension: " km", skin: "round" });
            </script>
        </div>
    </div>

    <div class="line2"></div>

    <!-- Acomodations -->
    <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse3">
        Loại hình <span class="collapsearrow"></span>
    </button>

    <div id="collapse3" class="collapse in">
        <div class="hpadding20">
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios2" id="Acomodation1" value="option1" checked>
                    Hotel
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios2" id="Acomodation2" value="option2">
                    Resort
                </label>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- End of Acomodations -->

    <div class="line2"></div>

    <!-- Hotel Preferences -->
    <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4">
        Tiện nghi khách sạn <span class="collapsearrow"></span>
    </button>
    <div id="collapse4" class="collapse in">
        <div class="hpadding20">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references[]" id="wifi">Wifi miễn phí
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references[]" id="park">Bãi đỗ xe
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references[]" id="elevator">Thang máy
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references[]" id="spa">Spa
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references[]" id="pool">Hồ bơi
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references[]" id="gym">Phòng gym
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references" id="restaurant">Nhà hàng
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references[]" id="coffee">Quán cà phê
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references[]" id="bar">Quầy bar
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="references[]" id="pets">Cho phép thú nuôi
                </label>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- End of Hotel Preferences -->

    <div class="line2"></div>
    <div class="clearfix"></div>
    <br/>
    <br/>
    <br/>


</div>
<!-- END OF FILTERS -->