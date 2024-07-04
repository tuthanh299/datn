<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DetailCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CCartController extends Controller
{
    public function index()
    {
        // dd(session()->get('cart'));
        if (Auth::guard('member')->check()) {
            $user = Auth::guard('member')->user();
            //$carts = Cart::where('member_id', $user->id)->get();
            //$detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();
            //$detail_cart = DetailCart::join('products', 'detail_carts.product_id', '=', 'products.id')->get();
            //$detail_cart_1 = DB::table('detail_carts')->join('products', 'detail_carts.product_id', '=', 'products.id')->get();

            return view('client.order.cart', compact('detail_cart', 'detail_cart_1', 'user', 'carts'));
            //dd($detail_cart, $detail_cart_1, $user, $carts);
        }

        return redirect()->route('user.login');
    }

    //thêm giỏ hàng từ index
    public function add_index($id = null, $quantity=1)
    {
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }
        $product = Product::where('id', $id)->first();
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id]['product_id'] = $id;
            $cart[$id]['name'] = $product->name;
            $cart[$id]['regular_price'] = $product->regular_price;
            $cart[$id]['sale_price'] = $product->sale_price;
            $cart[$id]['product_photo_path'] = $product->product_photo_path;
            $cart[$id]['quantity'] = $quantity;
        }
        
        session()->put('cart', $cart);
        // dd(session()->get('cart'));
    }

    public function delete($id)
    {
            $total = 0;
            if ($id) {
            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }

            foreach (session('cart') as $id => $details) {
                $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
            }
        }

        return response()->json(['is_passed' => 'true','total' => $total]);
    }
}
