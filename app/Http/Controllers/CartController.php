<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if(Auth::guard('member')->check()) 
        {
            $user = Auth::guard('member')->user();
            $carts = 1;
            return view('client.order.cart', compact('carts', 'user'));
        }

        return redirect()->route('client.login');
    }
}
