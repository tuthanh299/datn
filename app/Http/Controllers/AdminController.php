<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{

    public function loginAdmin()
    {

        if (auth()->check()) {
            return redirect()->to('admin');
        }
        return view('admin.login');
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
        return auth()->logout();
    }
}
