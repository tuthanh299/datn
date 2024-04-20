<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function index() 
    {
        /*$products = Product::all();*/
        $products = $this->product->paginate(10);
        return view('admin.product.index', compact('products'));
    }
}
