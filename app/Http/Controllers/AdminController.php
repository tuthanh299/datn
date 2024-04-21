<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        if (auth()->check()) {
            return redirect()->to('admin');
        }
        return view('login');
       

       
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
}
