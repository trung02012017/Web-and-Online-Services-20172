<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Book;
use App\FavoriteHotel;
use App\Room;
use App\Hotel;

class User extends Model
{
    protected $table = 'user';
    public $timestamps = false;

    public function review()
    {
        return $this->hasMany('App\Review', 'user_id', 'id');
    }

    public function book()
    {
        return $this->hasMany('App\Book', 'user_id', 'id');
    }

    public function favorite_hotel()
    {
        return $this->hasMany('App\FavoriteHotel', 'user_id', 'id');
    }

    public static function getProfile($id)
    {
        // thông tin của user
        $user = User::find($id);

        $books = Book::where("book.user_id", "=", $id)
                    ->get();

        $booked_rooms = array();
        foreach ($books as $book)
        {
            $temp = Room::join("hotels", "room.hotel_id", "hotels.id")
                                    ->where("room.id", "=", $book->room_id)
                                    ->first();
            $booked_rooms[] = $temp;
        }

        $favorite_hotels = FavoriteHotel::where('user_id', "=", $id)
                                        ->get();


        $hotels = array();
        foreach ($favorite_hotels as $fav)
        {
            $hotels[] = Hotel::find($fav->hotel_id);
        }

        return ["user" => $user, "booked_rooms" => $booked_rooms, "favorite_hotels" => $hotels];
    }

    public static function updateProfile($id, $sex, $name, $username, $email, $phone, $birth_date, $address, $city, $district)
    {
        $user = User::find($id);

        $user->sex = $sex;
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->phone = $phone;
        $user->birth_date = $birth_date;
        $user->address = $address;
        $user->city = $city;
        $user->district = $district;

        $user->save();
    }

    public static function changePassword($userid, $newpassword)
    {
        $user = User::find($userid);
        $user->password = $newpassword;
        $user->save();
    }

    public static function updateRole($userid, $roleid)
    {
        $user = User::find($userid);

        $user->admin = $roleid;
        $user->save();
    }

    public static function updateStatus($userid, $status)
    {
        $user = User::find($userid);

        $user->status = $status;
        $user->save();
    }
}
