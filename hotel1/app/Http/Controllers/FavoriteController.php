<?php

namespace App\Http\Controllers;

use App\FavoriteHotel;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
    {
        $userid = session('userid');
        $hotel_id = $request->input('hotel_id');
        FavoriteHotel::deleteFavorite($userid, $hotel_id);
    }

    public function add(Request $request)
    {
        $userid = session('userid');
        $hotelid = $request->input('hotelid');

        $fav = FavoriteHotel::where([['user_id', '=', $userid], ['hotel_id', '=', $hotelid],])
                            ->first();
        if ($fav)
        {
            FavoriteHotel::deleteFavorite($userid, $hotelid);
            return 0;
        }
        else
        {
            FavoriteHotel::add($userid, $hotelid);
            return 1;
        }
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
