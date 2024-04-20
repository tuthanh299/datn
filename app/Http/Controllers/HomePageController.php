<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomePageController extends Controller
{
    public function login()
    {
        return view('userlogin');
    }

    public function postLogin(Request $request) 
    {
        $cre = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($cre)) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
            //dd('chuẩn');
        } else {
            //dd('sai');
            return back()->withErrors(['login_error' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    public function register(Request $request) 
    {
        dd('test');
    }

    public function postRegister(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::create([
            'email' => $email,
            'password' => Hash::make($password),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email_verified_at' => now(),
            'remember_token' => '',
            'role_id' => 2,
            'provider' => '',
            'provider_id' => '',
            'provider_token' => '',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null
        ]);

        dd($user);
    }

    public function logout()
    {
        return auth()->logout();
    }
}
