<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Member;
use App\Models\News;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\StaticNews;
use Illuminate\Http\Request;
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
        $news = News::select('id', 'name', 'description', 'photo_path')->where('status', 1)
        ->where('outstanding', 1)
        ->whereNull('deleted_at')->get();
        $aboutus = StaticNews::select('name', 'description', )->first();
        $publisher = Publisher::select('id', 'name', 'photo_path')->get();
        $category_first = Category::with('children')->where('outstanding', 1)->where('status', 1)->whereNull('deleted_at')->where('parent_id', 0)->get();
        $productOutstanding = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount', )
            ->where('status', 1)
            ->where('outstanding', 1)
            ->whereNull('deleted_at')
            ->get(); 
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user();

            return view('client.index', compact('sliders', 'news', 'productOutstanding', 'aboutus', 'publisher', 'category_first', 'user'));

        }
        return view('client.index', compact('sliders', 'news', 'productOutstanding', 'aboutus', 'publisher', 'category_first'));

    }
    public function PublisherProduct($id)
    {
        $publisher = Publisher::where('id', $id)->firstOrFail();
        $pagename = $publisher->name;
        $publisherproduct = Product::where('publisher_id', $id)->where('status', 1)->whereNull('deleted_at')->latest()->paginate(20);
        return view('client.product.publisher_product', compact('publisherproduct', 'pagename'));
    }
    public function CategoryIdProduct($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $pagename = $category->name;
        $categoryidproduct = Product::where('category_id', $id)->where('status', 1)->whereNull('deleted_at')->latest()->paginate(20);
        return view('client.product.categoryid_product', compact('categoryidproduct', 'pagename'));
    }

    public function getCategoryData(Request $request)
    {
        $categoryId = $request->input('categoryId');
        $products = Product::where('category_id', $categoryId)->get();
        return response()->json(['products' => $products]);
    }

    public static function MenuCategory()
    {
        $menufisrt = Category::with('children')->where('status', 1)->whereNull('deleted_at')->where('parent_id', 0)->get();
        return $menufisrt;
    }
    public static function getUserInfo()
    {
        $id = session()->get('user_id');

        if($id){
            $user = Member::where('id', session()->get('user_id'))->first();
        } else {
            $user = Auth::guard('member')->user();
        }
        
        return $user;
    }

}
