<div class="itemscontainer offset-1" id="roomlist">
@foreach ($ds_room as $room)
    <div class="padding20">
        <div class="col-md-4 offset-0">
            <a href="#">
                @if ($room[0]->img)
                    <img src="{{asset('images/' . $room[0]->img)}}" alt="" class="fwimg"/>
                @else
                    <img src="{{asset('images/hotel/loading.png')}}" alt="" class="fwimg"/>
                @endif
            </a>
        </div>
        <div class="col-md-8 offset-0">
            <div class="col-md-8 mediafix1">
                <h4 class="opensans dark bold margtop1 lh1"><?php echo $room[0]->quality ?></h4>
                <?php echo "Sức chứa: " . $room[0]->capacity . " người" ?>
                </br>
                <?php echo $room[0]->type_of_bed; ?>
                <ul class="hotelpreferences2">
                    @if($room[0]->internet)
                        <li class="icohp-internet"></li>
                    @endif
                    @if($room[0]->air)
                        <li class="icohp-air"></li>
                    @endif
                    @if($room[0]->hairdryer)
                        <li class="icohp-hairdryer"></li>
                    @endif
                    @if($room[0]->tv)
                        <li class="icohp-tv"></li>
                    @endif
                    @if($room[0]->fridge)
                        <li class="icohp-fridge"></li>
                    @endif
                    @if($room[0]->microwave)
                        <li class="icohp-microwave"></li>
                    @endif
                    @if($room[0]->roomservice)
                        <li class="icohp-roomservice"></li>
                    @endif
                </ul>
                <div class="clearfix"></div>
                <ul class="checklist2 margtop10">
                    @if($room[0]->cancellation)
                        <li>Có thể hoàn hủy</li>
                    @endif
                    @if($room[0]->breakfast)
                        <li>Bao gồm bữa sáng</li>
                    @endif
                </ul>
            </div>
            <div class="col-md-4 center bordertype4">
                <span class="opensans green size24"><?php echo number_format($room[0]->price_per_night, 0, '.', ',') . " đ"; ?></span><br/>
                <span class="opensans lightgrey size12">giá / 1 đêm</span><br/><br/>
                @if (session('checkin') && session('checkout'))
                    <span class="lred bold"><?php echo "Còn " . $room[1] . " phòng"; ?></span><br/><br/>
                @else
                    <span class="lred bold">Cập nhật ngày để kiểm tra phòng trống</span><br/><br/>
                @endif
                <a href="{{url('room/book/' . $room[0]->id)}}"><button class="bookbtn mt1">Đặt phòng</button></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="line2"></div>
@endforeach
</div>