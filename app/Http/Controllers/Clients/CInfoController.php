<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Models\Cart;
use App\Models\DetailCart;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CInfoController extends Controller
{
    public function index() 
    {
        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user();
            $cart = Cart::where('member_id', $user->id)->get();
            $detail_cart = DetailCart::where('cart_id', $cart[0]->id)->get();

            return view('client.info.index', compact('user', 'detail_cart'));
        }

        return redirect()->route('user.login');
    }

    public function update(Request $request) 
    {
        if(!Auth::guard('member')->check())
        {
            return redirect()->route('user.login');
        }

        $all = $request->all();
        $user = Auth::guard('member')->user();

        $check = Member::where('id', $user->id)->update([
            'first_name' => $all['first_name'],
            'last_name'=> $all['last_name'],
            'phone' => $all['phone'],
            'email' => $all['email'],
        ]);

        if($check) 
        {
            return redirect()->route('user.info')->with('success','Cập nhật thành công');
        }

        return redirect()->route('user.info')->with('fail','Cập nhật thất bại');

        //dd($all, $user);
    }

    public function delete() 
    {
        if(!Auth::guard('member')->check())
        {
            return redirect()->route('user.login');
        }

        $user = Auth::guard('member')->user();
        $check = Member::where('id', $user->id)->delete();

        if($check)
        {
            Auth::guard('member')->logout();
            return redirect()->route('index')->with('success','Xoá thành công');
        }
 
        return redirect()->route('user.info')->with('fail','Xoá không thành công');
    }
}
