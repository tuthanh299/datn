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
       if(auth()->check()){
        return redirect()->to('home');
       } 
        return view('login');
    }
    public function postLoginAdmin(Request $request)
    {
        $cre = $request->input('');
        $user = User::all();
        foreach ($user as $key) {
            if ($key->email == $request->email && $key->password == $request->password) {
                $cretam = $request->validate([
                    'email'=> ['required', $key->email],
                    'password'=> ['required', $key->password],
                ]);
            }
        }

        if (Auth::attempt($cre)) {
            $request->session()->regenerate();
            return redirect()->to('home');
        }

        return back()->withErrors(['email'=> 'Không tìm thấy email']);

        /*$remember = $request->has( key:'remember_me') ? true : false;
        if (auth()->attempt([
            'email'=> $request->email,
            'password'=> $request->password
        ], $remember)) {
            return view('home');
        }
        else {
            return view('login');
        };*/
        //return view('home');
    }
}
