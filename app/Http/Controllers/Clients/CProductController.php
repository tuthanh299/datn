<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CProductController extends Controller
{
    public function index()
    {
        $productInternal = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')->where('deleted_at', null)->latest()->paginate(20);
        $pageName = 'Sản phẩm';
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user();
            return view('client.product.index', compact('productInternal', 'user', 'pageName'));
        }

        return view('client.product.index', compact('productInternal', 'pageName'));
    }

    public function detail($id)
    {

        $productDetail = Product::find($id);
        $pageName = $productDetail->name;
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user();
            return view('client.product.detail', compact('productDetail', 'user', 'pageName'));
        }

        return view('client.product.detail', compact('productDetail', 'pageName'));
    }

}
