<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/hotel/search', 'HotelController@search');

Route::get('/hotel/{city}', 'HotelController@getHotelByCity');

Route::get('/hotel/detail/{id}', 'HotelController@getHotelDetailById');

Route::get('/login', function () {
   return view('login');
});

Route::post('checklogin', 'UserController@checkLogin');

Route::get('logout', ['as'=>'logout', function(){
    session()->flush();
    return redirect()->route('home');
}]);

Route::post('/review/addreview', 'ReviewController@addReview');

Route::post('hotel/filter', 'HotelController@filterHotel');

Route::post('room/update', 'RoomController@updateStatusRoom');

Route::get('room/book/{id}', 'BookController@showBookingPage');

Route::post('book/sendrequest', 'BookController@sendRequest');

Route::get('book/getresponse', 'BookController@getResponse');

Route::get('profile/{id}', 'UserController@showProfile');

Route::post('user/update', 'UserController@updateProfile');

Route::post('favorite/delete', 'FavoriteController@delete');

Route::post('user/changepassword', 'UserController@changePassword');

Route::get('admin', 'AdminController@showAdminPage');

Route::post('user/updaterole', 'UserController@updateRole');

Route::post('user/updatestatus', 'UserController@updateStatus');

Route::post('hotel/delete', 'HotelController@deleteHotel');

Route::post('hotel/updatehotel', 'HotelController@updateHotel');

Route::post('hotel/addhotel', 'HotelController@addHotel');

Route::post('favorite/add', 'FavoriteController@add');

Route::post('hotel/sort', 'HotelController@sortHotel');

Route::post('hotel/dss', 'HotelController@getDSS');


