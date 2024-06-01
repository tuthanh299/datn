<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class CUserController extends Controller
{
    public function loginUser()
    {

        return view('client.user.login');
    }
    public function registerUser()
    {

        return view('client.user.register');
    }
}
