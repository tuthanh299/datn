<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\SaleInvoiceDetail;
use App\Models\DetailCart;
use App\Models\SaleInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class COrderController extends Controller
{
    public function index() 
    {
        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user();
            $cart = Cart::where('member_id', $user->id)->get();
            $detail_cart = DetailCart::where('cart_id', $cart[0]->id)->get();
            $hdb = SaleInvoice::where('member_id', $user->id)->get();

            return view('client.order.order', compact('user', 'detail_cart', 'hdb'));
        }
        return redirect()->route('login');
    }

    public function detail() 
    {
        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user();
            $cart = Cart::where('member_id', $user->id)->get();
            $detail_cart = DetailCart::where('cart_id', $cart[0]->id)->get();
            $hdb = SaleInvoice::where('member_id', $user->id)->get();
            $cthdb = SaleInvoiceDetail::where('sale_invoice_id', $hdb[0]->id)->get();

            return view('client.order.detail', compact('user', 'detail_cart', 'hdb', 'cthdb'));
        }
        return redirect()->route('login');
    }
}