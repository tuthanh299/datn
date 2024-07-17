<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Rate;
use App\Models\SaleInvoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class COrderController extends Controller
{
    public function index()
    {
        if (Auth::guard('member')->user()) {
            $allrate = Rate::all();
            $user = Auth::guard('member')->user();
            $hdb = Order::where('member_id', $user->id)->orderBy('created_at', 'desc')->get();

            //dd($hdb, $allrate);
            return view('client.order.order', compact('user', 'hdb', 'allrate'));
        }
        return redirect()->route('login');
    }

    public function detail($id)
    {
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user();
            $hdb = Order::where('id', $id)->get();
            //$cthdb = DB::table('sale_invoice_details')->join('products', 'sale_invoice_details.product_id', '=', 'products.id')->get();
            $cthdb = OrderDetail::join('products', 'products.id', '=', 'order_details.product_id')->where('order_id', $id)->get();
            //$cthdb = DB::table('order_details')->join('products', 'order_details.product_id', '=', 'products.id')->get();
            return view('client.order.order_detail', compact('user', 'hdb', 'cthdb'));
            //dd($cthdb);
        }
        return redirect()->route('login');
    }
}
