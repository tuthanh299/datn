<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CChangePasswordController extends Controller
{
    public function index()
    {
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user(); 
            return view('client.info.changepassword', compact('user', 'hdb'));
        }
        return redirect()->route('login');
    }
}
