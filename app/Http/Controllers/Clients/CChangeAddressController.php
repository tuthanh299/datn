<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DetailCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CChangeAddressController extends Controller
{
    public function index()
    {
        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user(); 
            return view('client.info.changeaddress', compact('user', 'hdb'));
        }
        return redirect()->route('login');
    }
}
