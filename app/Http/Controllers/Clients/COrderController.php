<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\SaleInvoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class COrderController extends Controller
{
    public function index()
    {
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user();
            $hdb = SaleInvoice::where('member_id', $user->id)->get();

            return view('client.order.order', compact('user', 'hdb'));
        }
        return redirect()->route('login');
    }

    public function detail()
    {
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user();
            $hdb = SaleInvoice::where('member_id', $user->id)->get();
            $cthdb = DB::table('sale_invoice_details')->join('products', 'sale_invoice_details.product_id', '=', 'products.id')->get();
            return view('client.order.order_detail', compact('user', 'hdb', 'cthdb'));
            //dd($cthdb);
        }
        return redirect()->route('login');
    }
}
