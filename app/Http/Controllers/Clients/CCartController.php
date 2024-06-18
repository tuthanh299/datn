<?php
namespace App\Http\Controllers\Clients;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DetailCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CCartController extends Controller
{
    public function index()
    {
        if(Auth::guard('member')->check()) 
        {
            $user = Auth::guard('member')->user();
            $carts = 1;
            return view('client.order.cart', compact('carts', 'user'));
        }

        return redirect()->route('client.login');
    }

    public function add() {
        $user_id = Auth::guard('member')->user()->id;
        $cart_user = Cart::where('user_id', $user_id)->get();
        $product_id = request()->product_id;
        $product = Product::where('id', $product_id)->first();
        $quantity = request()->quantity;

        DetailCart::create([    
            'cart_id' => $cart_user->id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'price' => $product->price,
        ]);
    }
}
