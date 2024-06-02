<?php
namespace App\Http\Controllers\Clients;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class CCartController extends Controller
{
    public function cartUser()
    {
        //đổi giao diện lại, tách giỏ hàng và thanh toán riêng
        //client.cart.index
        /*$user = auth()->user();
        if($user) {
            return view('client.order.cart');
        }

        return view('client.login');*/
        $carts = 1;

        return view('client.order.cart', compact('carts'));
    }
}
