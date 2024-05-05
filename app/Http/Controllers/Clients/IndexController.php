<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\StaticNews;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /* Setting info */
    public static function settings()
    {
        $settings = Setting::first();
        return $settings;
    }
    public function index()
    {

        $sliders = Slider::select('name', 'description', 'photo_path')->get();
        $news = News::select('id', 'name', 'description', 'photo_path')->get();
        $aboutus = StaticNews::select('name', 'description', )->get();
        $productOutstanding = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')
            ->where('status', 1)
            ->where('outstanding',1)
            ->get();

        if (Auth::check())
        {
            $user = Auth::user();
            return view('client.index', compact('user','sliders', 'news', 'productOutstanding', 'aboutus'));
        }

        return view('client.index', compact('sliders', 'news', 'productOutstanding', 'aboutus'));
    }

}
