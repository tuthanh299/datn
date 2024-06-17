<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Cart;

class HomePageController extends Controller
{
    public function clientlogin(Request $request)
    {
        //return view('client.login');
        return view('client.user.login');
    }

    public function clientregister()
    {
        //return view('client.register');
        return view('client.user.register');
    }

    public function postlogin(LoginRequest $request) 
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::guard('member')->attempt($credentials))
        {
            $user = Auth::guard('member')->user();
            Auth::guard('member')->login($user);
            $request->session()->put('user_id', Auth::guard('member')->user()->id);
            //$request->session()->regenerate();
            return redirect()->route('index');
            //dd('đúng');
            //dd($user);
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

        //dd(Auth::guard('member')->attempt($credentials));

        //dd(Hash::make('123456'));

        //dd($user);
        //dd(Hash::make('123456'));
    }

    public function postregister(UserAddRequest $request) 
    {
        /*$cre = $request->validate([
            'firstname' => ['required', 'string', 'max:20'],
            'lastname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'confirm-password' => ['required'], 
            'address' => ['required'],
            'phone' => ['required']
        ]);*/

        $cre = $request->all();

        if($cre)
        {
            Member::create([
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            $member = Member::where('email', $request->email)->first();

            Cart::create([
                'member_id' => $member->id,
                'cart_total' => 0,
            ]);

            return redirect()->route('client.login')->with('success', 'Đăng ký thành công');
            //dd($cre, 'true', $member->id);
        }
        return redirect()->route('client.register')->with('fail', 'Đã có lỗi xảy ra');
        //dd($cre, 'false');
    }

    public function logout(Request $request) {
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        return redirect()->route('index');
    }
}
