<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Warehouse;

class CCartController extends Controller
{
    public function index()
    {
        return view('client.order.cart');
    }

    //thêm giỏ hàng từ index
    public function add_index($id = null, $quantity)
    {
        $product = Product::where('id', $id)->first();
        $qty = Warehouse::where('product_id', $id)->value('quantity');
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
            $cart[$id]['product_qty'] = $qty;
        }

        session()->put('cart', $cart);
    }

    public function changeQuantity($id, $method)
    {
        $cart = session()->get('cart');
        $total = 0;

        if ($method === 'plus') {
            $cart[$id]['quantity']++;
        } elseif ($method === 'minus') {
            $cart[$id]['quantity']--;
        } else {
            $cart[$id]['quantity'] = $method;
        }

        $updatePrice = ($cart[$id]['sale_price'] ? $cart[$id]['sale_price'] : $cart[$id]['regular_price']) * $cart[$id]['quantity'];
        session()->put('cart', $cart);
        foreach (session('cart') as $id => $details) {
            $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
        }

        return response()->json(['is_passed' => 'true', 'update_price' => $updatePrice, 'total' => $total]);
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

        $isEmpty = session()->get('cart') && count(session()->get('cart')) == 0;

        return response()->json(['is_passed' => 'true', 'total' => $total, 'is_empty' => $isEmpty]);
    }
}
