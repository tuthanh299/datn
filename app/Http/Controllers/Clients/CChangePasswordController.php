<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DetailCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CChangePasswordController extends Controller
{
    public function index() 
    {
        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user();
            //$cart = Cart::where('member_id', $user->id)->get();
            //$detail_cart = DetailCart::where('cart_id', $cart[0]->id)->get();

            return view('client.info.changepassword', compact('user', 'detail_cart', 'hdb'));
        }
        return redirect()->route('login');
    }
}
