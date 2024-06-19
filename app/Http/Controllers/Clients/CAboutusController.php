<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DetailCart;
use App\Models\StaticNews;
use Illuminate\Support\Facades\Auth;

class CAboutusController extends Controller
{
    public function index()
    {
        $firstRecord = StaticNews::select('name', 'content')->first();
        if ($firstRecord) {
            $pageName = $firstRecord->name;
            $aboutusin = $firstRecord->content;
        } else {
            $pageName = 'Về chúng tôi';
            $aboutusin = 'Nội dung đang cập nhật';
        }

        if(Auth::guard('member')->check()) 
        {
            $user = Auth::guard('member')->user();
            $carts = Cart::where('member_id', $user->id)->get();
            $detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();
            return view('client.aboutus.index', compact('pageName', 'aboutusin', 'user', 'detail_cart'));
        }
       
        return view('client.aboutus.index', compact('pageName', 'aboutusin'));
    }
}
