<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CProductController extends Controller
{
    public function index()
    {
        $productInternal = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')->where('deleted_at', null)->latest()->paginate(20);
        $pageName = 'Sản phẩm';
        

        return view('client.product.index', compact('productInternal', 'pageName'));
    }

    public function detail($id)
    {

        $productDetail = Product::find($id);
        $pageName = $productDetail->name;
        

        return view('client.product.detail', compact('productDetail', 'pageName'));
    }

    public function add(Request $request, $id )
    {
        //dd($request->all());

        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }
        $product = Product::where('id', $id)->first();
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            //$cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id]['product_id'] = $id;
            $cart[$id]['name'] = $product->name;
            $cart[$id]['regular_price'] = $product->regular_price;
            $cart[$id]['sale_price'] = $product->sale_price;
            $cart[$id]['product_photo_path'] = $product->product_photo_path;
            //$cart[$id]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);
    }

}
