<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function hotels()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }


    public static function getReviewOfHotel($hotel_id)
    {
        $reviews = Review::join("user", "review.user_id", "user.id")
                        ->where('hotel_id', '=', $hotel_id)
                        ->get();
        return $reviews;
    }

    public static function addReview($userid, $hotelid, $review, $date, $location, $room, $service, $cleaness, $value, $comfort, $equipment, $hotel, $meal, $avg_rating)
    {
        $new_review = new Review();
        $new_review->user_id = $userid;
        $new_review->hotel_id = $hotelid;
        $new_review->review = $review;
        $new_review->date = $date;
        $new_review->location = $location;
        $new_review->room = $room;
        $new_review->service = $service;
        $new_review->cleaness = $cleaness;
        $new_review->value = $value;
        $new_review->comfort = $comfort;
        $new_review->equipment = $equipment;
        $new_review->hotel = $hotel;
        $new_review->meal = $meal;
        $new_review->avg_rating = $avg_rating;
        $new_review->save();
    }
}
