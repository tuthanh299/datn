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
        $productInternal = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')->latest()->paginate(10);

        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user();

            return view('client.product.index', compact('productInternal', 'user'));
        }

        return view('client.product.index', compact('productInternal'));
    }   

    public function detail($id)
    {
        $productDetail = Product::find($id);  
        return view('client.product.detail', compact('productDetail'));
    }

}