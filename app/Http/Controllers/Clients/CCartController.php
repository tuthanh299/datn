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
        if(Auth::guard('member')->check()) 
        {
            $user = Auth::guard('member')->user();
            $carts = Cart::where('member_id', $user->id)->get();
            //$detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();
            $detail_cart = DetailCart::join('products', 'detail_carts.product_id', '=', 'products.id')->get();
            $detail_cart_1 = DB::table('detail_carts')->join('products', 'detail_carts.product_id', '=', 'products.id')->get();

            return view('client.order.cart', compact('detail_cart', 'detail_cart_1', 'user', 'carts'));
            //dd($detail_cart, $detail_cart_1, $user, $carts);
        }

        return redirect()->route('user.login');
    }


    //thêm giỏ hàng từ index
    public function add_index($id) {
        if(!Auth::guard('member')->check()) 
        {
            return redirect()->route('user.login');
        }

        $user_id = Auth::guard('member')->user()->id;
        $cart_user = Cart::where('member_id', $user_id)->get();
        $detail_cart_user = DetailCart::where('cart_id', $cart_user[0]->id)->get();
        //$product_id = request()->product_id;
        $product = Product::where('id', $id)->first();

        if ($detail_cart_user == null) {
            $check = DetailCart::create([    
                'cart_id' => $cart_user[0]->id,
                'product_id' => $id,
                'quantity' => 1,
                //'price' => $product->regular_price,
            ]);
            if ($check) {
                return redirect()->back()->with('success', 'Sách đã được thêm vào giỏ hàng');
            } else {
                return redirect()->back()->with('fail', 'Lỗi');
            }
        } 
        else {
            foreach ($detail_cart_user as $product) {
                if ($product->product_id == $id) {
                    $check = DetailCart::where('product_id', $id)->update([
                        'quantity' => $detail_cart_user[0]->quantity + 1,
                    ]);
        
                    if ($check) {
                        return redirect()->back()->with('success', 'Sách đã được thêm vào giỏ hàng');
                    } else {
                        return redirect()->back()->with('fail', 'Lỗi');
                    }
                }
            }

            
            $check = DetailCart::create([    
                'cart_id' => $cart_user[0]->id,
                'product_id' => $id,
                'quantity' => 1,
                //'price' => $product->price,
            ]);
            if ($check) {
                return redirect()->back()->with('success', 'Sách đã được thêm vào giỏ hàng');
            } else {
                return redirect()->back()->with('fail', 'Lỗi');
            }
        }

        /*if($detail_cart_user[0]->product_id == $id) 
        {
            $check = DetailCart::where('product_id', $id)->update([
                'quantity' => $detail_cart_user[0]->quantity++,
            ]);

            if ($check) {
                return redirect()->back()->with('success', 'Sách đã được thêm vào giỏ hàng');
            } else {
                return redirect()->back()->with('fail', 'Lỗi');
            }
        }             
        else 
        {
            $check = DetailCart::create([    
                'cart_id' => $cart_user->id,
                'product_id' => $id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
            if ($check) {
                return redirect()->back()->with('success', 'Sách đã được thêm vào giỏ hàng');
            } else {
                return redirect()->back()->with('fail', 'Lỗi');
            }
        }*/

        //dd($user_id, $id, $cart_user, $detail_cart_user, $product);
    }


    //thêm giỏ hàng từ chi tiết sản phẩm
    public function add($id, $count) {
        if(!Auth::guard('member')->check()) 
        {
            return redirect()->route('user.login');
        }

        $user_id = Auth::guard('member')->user()->id;
        $cart_user = Cart::where('member_id', $user_id)->get();
        $detail_cart_user = DetailCart::where('member_id', $cart_user->id)->get();
        //$product_id = request()->product_id;
        $product = Product::where('id', $id)->first();

        if($detail_cart_user[0]->product_id == $id) {
            $check = DetailCart::where('product_id', $id)->update([
                'quantity' => $detail_cart_user[0]->quantity + $count,
            ]);

            if ($check) {
                return redirect()->back()->with('success', 'Sách đã được thêm vào giỏ hàng');
            }
            else {
                $check = DetailCart::create([    
                    'cart_id' => $cart_user->id,
                    'product_id' => $id,
                    'quantity' => $count,
                    'price' => $product->price,
                ]);
                if ($check) {
                    return redirect()->back()->with('success', 'Sách đã được thêm vào giỏ hàng');
                }
            }
        }
    }

    public function update_qty(Request $request) 
    {
        $all = $request->collect();
        dd($all); 
    }

    public function delete($id)
    {
        $total = 0;
        $user = Auth::guard('member')->user();
        $cart = Cart::where('member_id', $user->id)->get();
        //$detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();
        $detail_cart = DetailCart::join('products', 'detail_carts.product_id', '=', 'products.id')->get();

        $del = DetailCart::where('product_id', $id)->delete();

        //dd($del, $id);
        if ($del) {
            //return view('client.order.cart', compact('detail_cart', 'user', 'cart'))->with('success', 'Xoá thành công');
            return redirect()->back()->with('success', 'Xoá thành công');
        }
        //return view('client.order.cart',compact('detail_cart', 'user', 'cart'))->with('fail', 'Xoá không thành công');
        return redirect()->back()->with('fail', 'Xoá không bạn');
    }
}
