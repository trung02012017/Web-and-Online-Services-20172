<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\User;
use Illuminate\Http\Request;

use App\Room;

use App\Book;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function updateStatusRoom(Request $request)
    {
        $id = $request->input('hotelid');

        $checkin = $request->input('checkin');
        $checkin = strtotime($checkin);
        $checkin = date('Y-m-d', $checkin);
        session(['checkin' => $checkin]);

        $checkout = $request->input('checkout');
        $checkout = strtotime($checkout);
        $checkout = date('Y-m-d', $checkout);
        session(['checkout' => $checkout]);

        $ds_room = Room::getRoomByHotelId($id);
        $room_left = Book::getRoomLeft($ds_room);

        return view('roomlist', ['ds_room' => $room_left]);
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
