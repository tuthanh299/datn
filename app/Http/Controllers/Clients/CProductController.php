<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\DetailCart;
use App\Models\Publisher;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Auth;

class CProductController extends Controller
{
    public function index()
    {
        $productInternal = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')->latest()->paginate(20);
        $pageName = 'Sản phẩm';
        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user();
            $carts = Cart::where('member_id', $user->id)->get();
            $detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();

            return view('client.product.index', compact('productInternal', 'user', 'detail_cart','pageName'));
        }

        return view('client.product.index', compact('productInternal','pageName'));
    }   

    public function detail($id)
    {

        $productDetail = Product::find($id);  
        $pageName = $productDetail->name;
        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user();
            $carts = Cart::where('member_id', $user->id)->get();
            $detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();

            return view('client.product.detail', compact('productDetail', 'user', 'detail_cart','pageName'));
        }

        return view('client.product.detail', compact('productDetail','pageName'));
    }

}