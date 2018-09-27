<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\User;
use Illuminate\Http\Request;

use App\Review;

use App\Book;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addReview(Request $request)
    {
        $userid = session('userid');
        $hotelid = $request->input('hotelid');

        // chỉ cho phép người dùng thêm review khi người đó đã từng đặt phòng khách sạn
        $booking = Book::getBook($userid, $hotelid);
        if (empty($booking))
        {
            $result['success'] = false;
            return json_encode($result);
        }

        $review = $request->input('review');
        $date = date('Y-m-d');
        $location = $request->input('location');
        $room = $request->input('room');
        $service = $request->input('service');
        $cleaness = $request->input('cleaness');
        $value = $request->input('value');
        $comfort = $request->input('comfort');
        $equipment = $request->input('equipment');
        $hotel = $request->input('hotel');
        $meal = $request->input('meal');
        $avg_rating = number_format(($location + $room + $service + $cleaness + $value +$comfort + $equipment + $hotel + $meal) / 9, 1);
        // them review
        Review::addReview($userid, $hotelid, $review, $date, $location, $room, $service, $cleaness, $value, $comfort, $equipment, $hotel, $meal, $avg_rating);

        // cap nhat khach san
        $ht = Hotel::find($hotelid);
        $old_number_rate = $ht->number_of_rate;
        $old_rate = $ht->rate;
        $new_rate = number_format(($old_rate * $old_number_rate + $avg_rating) / ($old_number_rate + 1), 1);
        $ht->rate = $new_rate;
        $ht->number_of_rate = $old_number_rate + 1;
        $ht->save();

        $result['success'] = true;
        return Response::json($result);
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
