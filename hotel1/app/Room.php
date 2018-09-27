<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $table = 'room';
    public $timestamps = false;

    public function book()
    {
        return $this->hasMany('App\Book', 'room_id', 'id');
    }

    public function hotels()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }

    public static function getRoomByHotelId($hotel_id)
    {
        $ds_room = Room::where('hotel_id', '=', $hotel_id)
                        ->get();
        return $ds_room;
    }

}
