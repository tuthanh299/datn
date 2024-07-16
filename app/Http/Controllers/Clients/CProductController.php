<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CProductController extends Controller
{
    public function index()
    {
        $productInternal = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')->where('status', 1)->whereNull('deleted_at')->latest()->paginate(20);
        $pageName = 'Sản phẩm';
        

        return view('client.product.index', compact('productInternal', 'pageName'));
    }

    public function detail($id)
    {

        $productDetail = Product::find($id);
        $pageName = $productDetail->name;
        $qty = Warehouse::where('product_id', $id)->value('quantity');
        $cart = session()->get('cart', []);
        $cqtyincart = isset($cart[$id]['quantity']) ? $cart[$id]['quantity'] : 0;

        //dd($qty);

        return view('client.product.detail', compact('productDetail', 'pageName', 'qty', 'cqtyincart'));
    }

    public function add(Request $request, $id )
    {
        //dd($request->all());

        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }
        $product = Product::where('id', $id)->first();
        $cart = session()->get('cart', []);
        $quantityToAdd = $request->input('qty-pro');
        $wqty = Warehouse::where('product_id', $id)->value('quantity');

        $currentQuantityInCart = isset($cart[$id]['quantity']) ? $cart[$id]['quantity'] : 0;
        $totalQuantity = $currentQuantityInCart + $quantityToAdd;

        if ($totalQuantity > $wqty) {
            return response()->json(['error' => 'Số lượng sản phẩm trong giỏ hàng vượt quá số lượng tồn kho'], 400);
        }

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
