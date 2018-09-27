<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function checkLogin(Request $request)
    {
        $username = $request->input("username");
        $password = $request->input("password");

        $user = User::where([['username', $username], ['password', $password],])
                    ->first();
        if (!empty($user))
        {
            if ($user->status == 1) {
                session(['userid' => $user->id]);
                session(['username' => $user->username]);
                session(['admin' => $user->admin]);
                return redirect()->route('home');
            }
            else {
                return view('login', ['fail' => "Tài khoản của bạn đã bị khóa. Vui lòng liên hệ với bộ phận hỗ trợ để được giải đáp"]);
            }
        }
        else
        {
            return view('login', ['fail' => "Tài khoản hoặc mật khẩu không đúng"]);
        }
    }

    public function showProfile($id)
    {
        $profile = User::getProfile($id);

        return view('profile', ["profile" => $profile]);
    }

    public function updateProfile(Request $request)
    {
        $id = $request->input('id');
        $sex = $request->input('sex');
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $birth_date = $request->input('birth_date');
        $address = $request->input('address');
        $city = $request->input('city');
        $district = $request->input('district');

        User::updateProfile($id, $sex, $name, $username, $email, $phone, $birth_date, $address, $city, $district);
    }

    public function changePassword(Request $request)
    {
        $id = session('userid');
        $old = $request->input('old');
        $new1 = $request->input('new1');

        $user = User::find($id);
        if ($user->password != $old)
        {
            return 0;
        }
        else
        {
            User::changePassword($id, $new1);
            return 1;
        }
    }

    public function updateRole(Request $request)
    {
        $userid = $request->input('userid');
        $roleid = $request->input('roleid');

        User::updateRole($userid, $roleid);
    }

    public function updateStatus(Request $request)
    {
        $userid = $request->input('userid');
        $status = $request->input('status');

        User::updateStatus($userid, $status);
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
