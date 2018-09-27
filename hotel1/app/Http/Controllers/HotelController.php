<?php

namespace App\Http\Controllers;

use App\Book;
use App\FavoriteHotel;
use Illuminate\Http\Request;

use App\Hotel;

use App\Room;

use App\Review;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // tính điểm trung bình và số lượt đánh giá
    public function handleReviews($reviews)
    {
        $number_of_rate = count($reviews);
        $temp = 0;
        foreach ($reviews as $review)
        {
            $temp = $review->location + $review->room + $review->service + $review->cleaness + $review->value + $review->comfort + $review->equipment + $review->hotel + $review->meal;
        }
        $avg_score = round($temp/$number_of_rate, 1);
        return array($avg_score, $number_of_rate);
    }

    public function search(Request $request)
    {
        $city = $request->input("city");

        $checkin = $request->input("checkin");
        $checkin = strtotime($checkin);
        $checkin = date('Y-m-d', $checkin);

        $checkout = $request->input("checkout");
        $checkout = strtotime($checkout);
        $checkout = date('Y-m-d', $checkout);

        $sophong = $request->input("sophong");

        $sokhach = $request->input("sokhach");

        session(['checkin' => $checkin]);
        session(['checkout' => $checkout]);
        session(['sophong' => $sophong]);
        session(['sokhach' => $sokhach]);

        $ds_hotel = Hotel::getHotelByCity($city);
//        $reviews = Review::getReviewOfHotel($id);
//
//        $statistic = $this->handleReviews($reviews);

        return view('hotel', ['ds_hotel' => $ds_hotel]);
    }

    private function cmp1($hotel1, $hotel2)
    {
        if ($hotel1->number_of_rate == $hotel2->number_of_rate)
            return 0;
        else
            return $hotel1->number_of_rate > $hotel2->number_of_rate ? 1 : -1;
    }


    public function getHotelByCity($city)
    {
        $ds_hotel = Hotel::getHotelByCity($city);

        return view('hotel', ['ds_hotel' => $ds_hotel]);
    }

    public function getHotelDetailById($id)
    {
        $hotel = Hotel::find($id);
        $ds_room = Room::getRoomByHotelId($id);
        $room_left = Book::getRoomLeft($ds_room);
        $reviews = Review::getReviewOfHotel($id);

        $userid = session('userid');
        $fav = FavoriteHotel::where([["user_id", "=", $userid], ["hotel_id", "=", $id]])->first();
        if ($fav)
            $is_fav = 1;
        else
            $is_fav = 0;
        return view('detail', ['hotel' => $hotel, 'ds_room' => $room_left, 'reviews' => $reviews, 'is_fav' => $is_fav]);
    }

    public function filterHotel(Request $request)
    {
        $stars = $request->input('stars');
        $city = $request->input('city');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $min_distance = $request->input('min_distance');
        $max_distance = $request->input('max_distance');
        $type = $request->input('type');
        $references = $request->input('references');
        $ds_hotel = Hotel::filterHotel($stars, $city, $min_price, $max_price, $min_distance, $max_distance, $type, $references);
        return view('hotellist', ['ds_hotel' => $ds_hotel]);
    }

    public function sortHotel(Request $request)
    {
        $stars = $request->input('stars');
        $city = $request->input('city');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $min_distance = $request->input('min_distance');
        $max_distance = $request->input('max_distance');
        $type = $request->input('type');
        $references = $request->input('references');
        $prop = $request->input('prop');
        $option = $request->input('option');
        $ds_hotel = Hotel::sortHotel($stars, $city, $min_price, $max_price, $min_distance, $max_distance, $type, $references, $prop, $option);
        return view('hotellist', ['ds_hotel' => $ds_hotel]);
    }

    public function deleteHotel(Request $request)
    {
        $hotelid = $request->input('hotel_id');

        Hotel::deleteHotel($hotelid);
    }

    public function updateHotel(Request $request)
    {
        $hotelid = $request->input('hotelid');

        $type = $request->input('type');
        $name = $request->input('name');
        $description = $request->input('description');
        $city = $request->input('city');
        $address = $request->input('address');
        $distance = $request->input('distance');
        $wifi = $request->input('wifi');
        $park = $request->input('park');
        $elevator = $request->input('elevator');
        $restaurant = $request->input('restaurant');
        $coffee = $request->input('coffee');
        $bar = $request->input('bar');
        $pool = $request->input('pool');
        $spa = $request->input('spa');
        $gym = $request->input('gym');
        $pets = $request->input('pets');
        $lowest_price = $request->input('lowest_price');
        $stars = $request->input('stars');

        Hotel::updateHotel($hotelid, $type, $name, $description, $city, $address, $distance, $wifi, $park, $elevator, $restaurant, $coffee, $bar, $pool, $spa, $gym, $pets, $lowest_price, $stars);
    }

    public function addHotel(Request $request)
    {
        $type = $request->input('type');
        $name = $request->input('name');
        $description = $request->input('description');
        $city = $request->input('city');
        $address = $request->input('address');
        $distance = $request->input('distance');
        $wifi = $request->input('wifi');
        $park = $request->input('park');
        $elevator = $request->input('elevator');
        $restaurant = $request->input('restaurant');
        $coffee = $request->input('coffee');
        $bar = $request->input('bar');
        $pool = $request->input('pool');
        $spa = $request->input('spa');
        $gym = $request->input('gym');
        $pets = $request->input('pets');
        $lowest_price = $request->input('lowest_price');
        $stars = $request->input('stars');
        $imgfolder = $request->input('imgfolder');

        Hotel::addHotel($type, $name, $description, $city, $address, $distance, $wifi, $park, $elevator, $restaurant, $coffee, $bar, $pool, $spa, $gym, $pets, $lowest_price, $stars, $imgfolder);

    }

    private function cmp2($hotel1, $hotel2)
    {
        if ($hotel1->score == $hotel2->score)
            return 0;
        else
            return $hotel1->score > $hotel2->score ? 1 : -1;
    }

    // hệ trợ giúp quyết định
    public function getDSS(Request $request)
    {
        // lọc các khách sạn thỏa mãn yêu cầu tối thiểu
        $stars = $request->input('stars');
        $city = $request->input('city');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $min_distance = $request->input('min_distance');
        $max_distance = $request->input('max_distance');
        $type = $request->input('type');
        $references = $request->input('references');
        $ds_hotel = DB::table('hotels')
                        ->where('city', 'like', $city)
                        ->where('type', '=', $type)
                        ->whereIn('stars', $stars)
                        ->whereBetween('lowest_price', [$min_price, $max_price])
                        ->whereBetween('distance_to_centre', [$min_distance, $max_distance])
                        ->whereIn('wifi', [$references[0], 1])
                        ->whereIn('park', [$references[1], 1])
                        ->whereIn('elevator', [$references[2], 1])
                        ->whereIn('spa', [$references[3], 1])
                        ->whereIn('swimming_pool', [$references[4], 1])
                        ->whereIn('gym', [$references[5], 1])
                        ->whereIn('restaurant', [$references[6], 1])
                        ->whereIn('coffee', [$references[7], 1])
                        ->whereIn('bar', [$references[8], 1])
                        ->whereIn('pets', [$references[9], 1])
                        ->get();

        // đưa các thuộc tính về cùng kiểu thuộc tính lợi ích
        $distance = array();
        $facility = array();
        $price = array();
        $stars = array();
        $rate = array();
        $popular = array();
        foreach ($ds_hotel as $ht)
        {
            $distance[] = 1 / $ht->distance_to_centre;
            $facility[] = $ht->wifi + $ht->park + $ht->elevator + $ht->restaurant + $ht->coffee + $ht->bar + $ht->swimming_pool + $ht->spa + $ht->gym + $ht->pets;
            $price[] = 1 / $ht->lowest_price;
            $stars[] = $ht->stars;
            $rate[] = $ht->rate;
            $popular[] = $ht->number_of_rate;
        }

        // chuẩn hóa thuộc tính: dùng chuẩn hóa vector
        $dis_norm = 0;
        $facility_norm = 0;
        $price_norm = 0;
        $stars_norm = 0;
        $rate_norm = 0;
        $popular_norm = 0;
        for ($i = 0; $i < count($distance); $i++)
        {
           $dis_norm += pow($distance[$i], 2);
           $facility_norm += pow($facility[$i], 2);
           $price_norm += pow($price[$i], 2);
           $stars_norm += pow($stars[$i], 2);
           $rate_norm += pow($rate[$i], 2);
           $popular_norm += pow($popular[$i], 2);
        }

        for ($i = 0; $i < count($distance); $i++)
        {
            $distance[$i] /= sqrt($dis_norm);
            $facility[$i] /= sqrt($facility_norm);
            $price[$i] /= sqrt($price_norm);
            $stars[$i] /= sqrt($stars_norm);
            $rate[$i] /= sqrt($rate_norm);
            $popular[$i] /= sqrt($popular_norm);
        }

        // tính trọng số
        $sum = $request->input('w1') + $request->input('w2') + $request->input('w3') + $request->input('w4') + $request->input('w5') + $request->input('w6');
        $w1 = $request->input('w1') / $sum;
        $w2 = $request->input('w2') / $sum;
        $w3 = $request->input('w3') / $sum;
        $w4 = $request->input('w4') / $sum;
        $w5 = $request->input('w5') / $sum;
        $w6 = $request->input('w6') / $sum;

        // tính các giá trị theo trọng số

        for ($i = 0; $i < count($distance); $i++)
        {
            $distance[$i] *= $w1;
            $facility[$i] *= $w2;
            $price[$i] *= $w3;
            $stars[$i] *= $w4;
            $rate[$i] *= $w5;
            $popular[$i] *= $w6;
        }

        // tính phương án lý tưởng tốt và lý tưởng xấu
        $best_distance = max($distance);
        $best_facility = max($facility);
        $best_price = max($price);
        $best_stars = max($stars);
        $best_rate = max($rate);
        $best_popular = max($popular);

        $worst_distance = min($distance);
        $worst_facility = min($facility);
        $worst_price = min($price);
        $worst_stars = min($stars);
        $worst_rate = min($rate);
        $worst_popular = min($popular);

        // tính khoảng cách và độ tương tự tới phương án lý tưởng
        $score = array();
        for ($i = 0; $i < count($distance); $i++)
        {
            $s1 = sqrt(pow($distance[$i] - $best_distance, 2)
                         + pow($facility[$i] - $best_facility, 2)
                         + pow($price[$i] - $best_price, 2)
                         + pow($stars[$i] - $best_stars, 2)
                         + pow($rate[$i] - $best_rate, 2)
                         + pow($popular[$i] - $best_popular, 2));

            $s2 = sqrt(pow($distance[$i] - $worst_distance, 2)
                         + pow($facility[$i] - $worst_facility, 2)
                         + pow($price[$i] - $worst_price, 2)
                         + pow($stars[$i] - $worst_stars, 2)
                         + pow($rate[$i] - $worst_rate, 2)
                         + pow($popular[$i] - $worst_popular, 2));

            $score[] = $s2 / ($s1 + $s2);
        }

        $i = 0;
        foreach ($ds_hotel as $ht)
        {
            $ht->score = $score[$i];
            $i++;
        }

        $sorted = $ds_hotel->sortByDesc('score');

        return view('hotellist', ['ds_hotel' => $sorted]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
