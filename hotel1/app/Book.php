<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo('App\Hotel', 'room_id', 'id');
    }

    public static function getBook($userid, $hotelid)
    {
        $book = Book::join("room", "book.room_id", "room.id")
                    ->where([["user_id", "=", $userid], ["hotel_id", "like", $hotelid],])
                    ->first();
        return $book;
    }

    public static function getRoomLeft($ds_room)
    {
        $room_left = array();
        foreach ($ds_room as $room)
        {
            $booked_room = array();
            if (session('checkin') && session('checkout')) {
                $booked_room = Book::where([["room_id", "=", $room->id], ["check_in", ">=", session('checkin')], ["check_in", "<=", session("checkout")],])
                    ->orWhere([["room_id", "=", $room->id], ["check_out", ">=", session('checkin')], ["check_out", "<=", session("checkout")],])
                    ->orWhere([["room_id", "=", $room->id], ["check_in", "<=", session('checkin')], ["check_out", ">=", session("checkout")],])
                    ->get();
            }
            $room_left[] = [$room, $room->amount - count($booked_room)];
        }
        return $room_left;
    }
}
