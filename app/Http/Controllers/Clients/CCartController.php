<?php
namespace App\Http\Controllers\Clients;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class CCartController extends Controller
{
    public function cartUser()
    {
       
        return view('client.order.cart');
    }
}
