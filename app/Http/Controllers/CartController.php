<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('cart.index', compact('carts', 'cart1s'));
        //dd($carts, $cart1s);
    }
}
