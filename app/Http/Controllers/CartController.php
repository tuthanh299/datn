<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index () 
    {
        $carts = [];
        $cart1s = [
            [
                'id' => 1,
                'name' => 'Product 1',
                'price' => 1000,
                'quantity' => 1
            ],
            [
                'id' => 2,
                'name' => 'Product 2',
                'price' => 1000,
                'quantity' => 1
            ],
        ];
        if (Auth::check()) 
        {
            $user = Auth::user();
            return view('cart.index', compact('carts', 'cart1s', 'user'));
        }
        else 
        {
            $user = null;
            return view('cart.index', compact('carts', 'cart1s', 'user'));
        }
        
        //dd($carts, $cart1s);
    }
}
