<div class="itemscontainer offset-1" id="hotellist">
    @foreach($ds_hotel as $hotel)
        <div class="offset-2">
            <div class="col-md-4 offset-0">
                <div class="listitem2">
                    <a href="{{url('hotel/detail/' . $hotel->id)}}">
                        <img src="{{asset('images/' . $hotel->img_folder . "/main.jpg")}}" alt=""/></a>
                    {{--<div class="liover"></div>--}}
                    {{--<a class="fav-icon" href="#"></a>--}}
                    {{--<a class="book-icon" href="details.html"></a>--}}
                </div>
            </div>
            <div class="col-md-8 offset-0">
                <div class="itemlabel3">
                    <div class="labelright">
                        <img src="{{asset('images/filter-rating-' . $hotel->stars . '.png')}}" width="60" alt=""/><br/><br/><br/>
                        {{--<img src="{{asset('images/user-rating-5.png')}}" width="60" alt=""/><br/>--}}
                        <div class="box-review">
                            <span class="rate"><?php echo $hotel->rate; ?></span>
                            <span class="rate-info">
                                    <?php
                                $rate = $hotel->rate;
                                if ($rate >= 8) echo "Xuất sắc";
                                else if ($rate < 8 && $rate >= 7) echo "Tốt";
                                else if ($rate < 7 && $rate >= 5) echo "Khá";
                                else echo "Trung bình";
                                ?>
                                    </span>
                            <p class="rate-number-info">
                                <?php
                                echo "( " . $hotel->number_of_rate . " đánh giá )";
                                ?>
                            </p>
                        </div>

                        <span class="green size18"><b><?php echo number_format($hotel->lowest_price, 0, '.', ',') . " đ"; ?></b></span><br/>
                        {{--<span class="size11 grey">avg/night</span><br/><br/><br/>--}}
                        {{--<form action="details.html">--}}
                        <a href="{{url('/hotel/detail/' . $hotel->id)}}"><button class="bookbtn mt1" type="submit">Đặt phòng</button></a>
                        {{--</form>--}}
                    </div>
                    <div class="labelleft2">
                        <a href="{{url('hotel/detail/' . $hotel->id)}}" style="text-decoration: none"><b><?php echo $hotel->name; ?></b></a></b><br/><br/><br/>
                        <p class="grey">
                            <?php if(strlen($hotel->description) > 220) echo substr($hotel->description, 0, 220) . '...';
                            else echo $hotel->description; ?></p><br/>
                        <ul class="hotelpreferences2">
                            @if($hotel->wifi)
                                <li class="icohp-internet"></li>
                            @endif
                            @if($hotel->park)
                                <li class="icohp-parking"></li>
                            @endif
                            @if($hotel->restaurant)
                                <li class="icohp-breakfast"></li>
                            @endif
                            @if($hotel->coffee)
                                <li class="icohp-living"></li>
                            @endif
                            @if($hotel->bar)
                                <li class="icohp-bar"></li>
                            @endif
                            @if($hotel->swimming_pool)
                                <li class="icohp-pool"></li>
                            @endif
                            @if($hotel->spa)
                                <li class="icohp-spa"></li>
                            @endif
                            @if($hotel->gym)
                                <li class="icohp-fitness"></li>
                            @endif
                            @if($hotel->pets)
                                <li class="icohp-pets"></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="offset-2"><hr class="featurette-divider3"></div>
    @endforeach
</div>