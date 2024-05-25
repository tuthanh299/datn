<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomePageController extends Controller
{
    public function clientlogin()
    {
        return view('client.login');
    }

    public function clientregister()
    {
        return view('client.register');
    }

    public function postlogin(Request $request) 
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::guard('member')->attempt($credentials))
        {
            return redirect()->route('index');
        }
        //$email = $request->input('email');
        //$password = $request->input('password');

        /*$check = [
            ['email', '=', $email], 
            //['password', '=', $password]
        ];

        $user = Member::where($check)->get();

        if(Hash::check($password, $user[0]->password)){
            return redirect()->route('index');
        }*/

        /*if($user) 
        {
            $is_logged = 1;
            $id = $user->id;
            setcookie('is_logged', $is_logged, time() + 360000, '/');
            setcookie('id', $id, time() + 360000, '/');
            return redirect()->route('index');
        }*/
        return redirect()->route('client.login')->with('fail', 'Tài khoản hoặc mật khẩu không chính xác.');

        //dd($user);
        //dd(Hash::make('123456'));
    }

    public function postregister(Request $request) 
    {
        $cre = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirm-password' => ['required'], 
            'address' => ['required'],
            'phone' => ['required']
        ]);

        if($cre)
        {
            /*Member::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
            ]);*/

            //return redirect()->route('client.login');
            dd($cre, 'true');
        }
        //return redirect()->route('client.register')->with('fail', 'Đã có lỗi xảy ra');
        dd($cre, 'false');
    }
}
