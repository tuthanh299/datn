<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function loginAdmin()
    {

        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->to('admin');
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember_me'))->withErrors([
                'login_error' => 'Email hoặc mật khẩu không đúng.',
            ]);
        }

    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
