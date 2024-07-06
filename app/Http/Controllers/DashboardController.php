<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImportOrder;
use App\Models\ImportOrderDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect()->route('admin.login');
        }
        $product = Product::get();
        $hdb = Order::get();
        $cthdb = OrderDetail::get();
        $hdn = ImportOrder::get();
        $cthdn = ImportOrderDetail::get();
        $category = Category::get();


        //tính tổng doanh thu
        $total_sale = 0;
        foreach ($hdb as $value) {
            $total_sale = $total_sale + $value->total_price;
        }

        //tính tổng chi
        $total_import_sale = 0;
        foreach ($hdn as $value) {
            $total_import_sale = $total_import_sale + $value->total_price;
        }

        //tính tổng lời
        $total_profit = 0;
        foreach ($cthdb as $value) {
            $product = Product::where('id', $value->product_id)->first();
            if($product->sale_price == 0) {
                $total_profit = $total_profit + ($product->regular_price * 30/100) * $value->quantity;
            } else {
                $total_profit = $total_profit + ($product->sale_price * 30/100) * $value->quantity;
            }
        }
        $sold_pro = Product::select('products.id', 'products.name', 'order_details.quantity as quantity', DB::raw('SUM(order_details.regular_price * order_details.quantity) as sold', ), 'orders.order_code as order_code', 'orders.total_price as total_price', 'orders.status as status')
                    ->join('order_details', 'order_details.product_id', '=', 'products.id')
                    ->join('orders', 'orders.id', '=', 'order_details.order_id')
                    ->where('orders.status', 1)
                    ->groupBy('products.id', 'products.name', 'order_details.quantity', 'orders.order_code', 'orders.total_price', 'orders.status')
                    ->orderBy('orders.created_at', 'desc')
                    ->get();
        

        return view('admin.dashboard.dashboard', compact('product', 'hdb', 'hdn', 'category', 'total_sale', 'cthdb', 'sold_pro', 'total_import_sale', 'total_profit', 'cthdn'));
        //return view('admin.dashboard.dashboard', compact('cthdb', 'sold_pro'));
        //dd( $sold_pro, $cthdb, $product, $hdb, $hdn, $category, $total_sale);
    }

}
