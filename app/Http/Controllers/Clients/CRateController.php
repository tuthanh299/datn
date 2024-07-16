<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Rate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CRateController extends Controller
{
    public function index() {
        if(!Auth::guard('member')->check())
        {
            return redirect()->route('user.login');
        }

        $allrate = Rate::all();

        $user = Auth::guard('member')->user();
        return view('client.info.rate', compact('user', 'allrate'));
    }

    public function detail($id, $rate_id) {
        if(!Auth::guard('member')->check())
        {
            return redirect()->route('user.login');
        }

        $hdb = Order::where('id', $id)->get();
        $cthdb = OrderDetail::join('products', 'products.id', '=', 'order_details.product_id')->where('order_id', $id)->get();

        $rate = Rate::where('id', $rate_id)->get();

        $user = Auth::guard('member')->user();
        //  dd($hdb, $cthdb, $rate, $user);
        return view('client.info.order_rate', compact('user', 'hdb', 'cthdb', 'rate'));
    }

    public function rate($id) {
        if(!Auth::guard('member')->check())
        {
            return redirect()->route('user.login');
        }

        $order_id = $id;

        $user = Auth::guard('member')->user();
        return view('client.info.order_rate', compact('user', 'order_id'));
    }

    public function store(Request $request) {
        //dd($request->all());
        $check = Rate::create([
            'order_id' => $request->order_id,
            'content' => $request->review,
            'star_num' => $request->star,
            'replies' => '',
        ]);
        if ($check) {
            return redirect()->route('user.order')->with('notify', [
                'status' => 'success',
                'message' => 'Đánh giá thành công'
            ]);
        } 
        else {
            return redirect()->route('user.order')->with('notify', [
                'status' => 'error',
                'message' => 'Đánh giá thất bại'
            ]);
        }
    }
}