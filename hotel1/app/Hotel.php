<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\FavoriteHotel;
use App\Review;
use App\Room;

class Hotel extends Model
{
    protected $table = 'hotels';
    public $timestamps = false;

//    protected $appends = ['score', 'facility'];
//
//    public function getScoreAttribute()
//    {
//        return $this->attributes['score'];
//    }
//
//    public function setScoreAttribute($score)
//    {
//        $this->attributes['score'] = $score;
//    }
//
//    public  function getFacilityAttribute()
//    {
//        return $this->attributes['facility'];
//    }
//
//    public function setFacilityAttribute($fac)
//    {
//        $this->attributes['facility'] = $fac;
//    }

    public function review()
    {
        return $this->hasMany('App\Review', 'hotel_id', 'id');
    }

    public function room()
    {
        return $this->hasMany('App\Room', 'hotel_id', 'id');
    }

    public function favorite_hotel()
    {
        return $this->hasMany('App\FavoriteHotel', 'hotel_id', 'id');
    }

    public static function getHotelByCity($city)
    {
        $ds_hotel = Hotel::where("city", "like", "%$city%")
                        ->orderBy("number_of_rate", "desc")
                        ->paginate(5);
        return $ds_hotel;
    }

    public static function filterHotel($stars, $city, $min_price, $max_price, $min_distance, $max_distance, $type, $references)
    {
        $ds_hotel = Hotel::where('city', 'like', $city)
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
        return $ds_hotel;
    }

    public static function sortHotel($stars, $city, $min_price, $max_price, $min_distance, $max_distance, $type, $references, $prop, $option)
    {
        $ds_hotel = Hotel::where('city', 'like', $city)
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
            ->orderBy($prop, $option)
            ->get();
        return $ds_hotel;
    }

    public static function deleteHotel($hotelid)
    {
        FavoriteHotel::where(["hotel_id", "=", $hotelid])
                    ->delete();
        Review::where(["hotel_id", "=", $hotelid])
                ->delete();

        $rooms = Room::where("hotel_id", "=", $hotelid)
                    ->get();

        foreach ($rooms as $room)
        {
            Book::where("room_id", "=", $room->id)
                ->delete();
            $room->delete();
        }

        Hotel::destroy($hotelid);
    }

    public static function updateHotel($hotelid, $type, $name, $description, $city, $address, $distance, $wifi, $park, $elevator, $restaurant, $coffee, $bar, $pool, $spa, $gym, $pets, $lowest_price, $stars)
    {
        $hotel = Hotel::find($hotelid);

        $hotel->type = $type;
        $hotel->name = $name;
        $hotel->description = $description;
        $hotel->city = $city;
        $hotel->address = $address;
        $hotel->distance_to_centre = $distance;
        $hotel->wifi = $wifi;
        $hotel->park = $park;
        $hotel->elevator = $elevator;
        $hotel->restaurant = $restaurant;
        $hotel->coffee = $coffee;
        $hotel->bar = $bar;
        $hotel->swimming_pool = $pool;
        $hotel->spa = $spa;
        $hotel->gym = $gym;
        $hotel->pets = $pets;
        $hotel->lowest_price = $lowest_price;
        $hotel->stars = $stars;

        $hotel->save();
    }

    public static function addHotel($type, $name, $description, $city, $address, $distance, $wifi, $park, $elevator, $restaurant, $coffee, $bar, $pool, $spa, $gym, $pets, $lowest_price, $stars, $imgfolder)
    {
        $hotel = new Hotel();

        $hotel->type = $type;
        $hotel->name = $name;
        $hotel->description = $description;
        $hotel->city = $city;
        $hotel->address = $address;
        $hotel->distance_to_centre = $distance;
        $hotel->wifi = $wifi;
        $hotel->park = $park;
        $hotel->elevator = $elevator;
        $hotel->restaurant = $restaurant;
        $hotel->coffee = $coffee;
        $hotel->bar = $bar;
        $hotel->swimming_pool = $pool;
        $hotel->spa = $spa;
        $hotel->gym = $gym;
        $hotel->pets = $pets;
        $hotel->lowest_price = $lowest_price;
        $hotel->stars = $stars;
        $hotel->img_folder = $imgfolder;

        $hotel->save();
    }
}
