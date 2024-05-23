<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function clientlogin()
    {
        return view('client.login');
    }

    public function oldpostlogin(Request $request) 
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $check = [
            ['email', '=', $email], 
            ['password', '=', $password]
        ];

        $user = User::where($check)->get();

        if($user) 
        {
            $is_logged = 1;
            $id = $user[0]->id;
            setcookie('is_logged', $is_logged, time() + 360000, '/');
            setcookie('id', $id, time() + 360000, '/');
            return redirect()->route('index');
        }
        return redirect()->route('dangnhap')->with('fail', 'Tài khoản hoặc mật khẩu không chính xác.');
    }
}
