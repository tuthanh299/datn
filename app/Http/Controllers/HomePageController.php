<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function login()
    {
        return view('userlogin');
    }

    public function postLogin(Request $request) 
    {
        
    }

    public function register() 
    {

    }

    public function postRegister(Request $request)
    {

    }

    public function logout()
    {
        return auth()->logout();
    }
}
