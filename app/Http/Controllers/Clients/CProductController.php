<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Auth;

class CProductController extends Controller
{
    public function index()
    {
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
        $user = Auth::guard('member')->user();
        $productInternal = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')->latest()->paginate(10);
        return view('client.product.index', compact('productInternal', 'user', 'cart1s'));
    }   

    public function detail($id)
    {
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
        $user = Auth::guard('member')->user();
        $productDetail = Product::find($id);  
        return view('client.product.detail', compact('productDetail', 'user', 'cart1s'));
    }

}
