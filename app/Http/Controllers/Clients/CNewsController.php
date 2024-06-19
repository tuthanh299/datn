<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DetailCart;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class CNewsController extends Controller
{
    public function index()
    {
        $newsInternal = News::select('id', 'name', 'description', 'photo_path')->latest()->paginate(8);
        if(Auth::guard('member')->check()) 
        {
            $user = Auth::guard('member')->user();
            $carts = Cart::where('member_id', $user->id)->get();
            $detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();

            return view('client.news.index', compact('newsInternal', 'user', 'detail_cart'));
        }
        return view('client.news.index', compact('newsInternal'));
    }

    public function detail($id)
    {
        $newsDetail = News::find($id);
        $newsInternal = News::select('id', 'name', 'description', 'photo_path')->get();
        if(Auth::guard('member')->check()) 
        {
            $user = Auth::guard('member')->user();
            $carts = Cart::where('member_id', $user->id)->get();
            $detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();
            return view('client.news.detail', compact('newsDetail', 'newsInternal', 'user', 'detail_cart'));
        }
        return view('client.news.detail', compact('newsDetail', 'newsInternal'));
    }

}
