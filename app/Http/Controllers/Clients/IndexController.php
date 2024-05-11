<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\StaticNews;
use Illuminate\Support\Facades\Auth;
use App\Models\Publisher;
use Illuminate\Http\Request;

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
        $publisher= Publisher::select('id','name','photo_path')->get();
        $category_first = Category::with('children')->where('parent_id', 0)->get();
        $user = Auth::user();
        $cart1s = [
            [
                'id' => 1,
                'name' => 'Product 1',
                'price' => 1000,
                'quantity' => 1
            ],
            [
                'id' => 2,
                'name' => 'Product 2',
                'price' => 1000,
                'quantity' => 1
            ],
        ];

        $productOutstanding = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount',)
            ->where('status', 1)
            ->where('outstanding', 1)
            ->get();

        if ($user != null)
        {
            $user = Auth::user();
            return view('client.index', compact('user','sliders', 'news', 'productOutstanding', 'aboutus', 'cart1s'));
            //dd($sliders, $news, $aboutus, $productOutstanding, $publisher, $category_first, $user);
        }

        return view('client.index', compact('sliders', 'news', 'productOutstanding', 'aboutus','publisher','category_first', 'user', 'cart1s'));
        //dd($sliders, $news, $aboutus, $productOutstanding, $publisher, $category_first);
    }
    public function publisherproduct($id)
    {
        $publisher = Publisher::where('id', $id)->firstOrFail();
        $pagename = $publisher->name;
        $publisherproduct = Product::where('publisher_id', $id)->latest()->paginate(10);;  
        return view('client.product.publisher_product', compact('publisherproduct','pagename'));
    } 
    
    public function getCategoryData(Request $request)
    {
        $categoryId = $request->input('categoryId');
    
        $products = Product::where('category_id', $categoryId)->get();
    
         
    
        return response()->json(['products' => $products]);
    }
    
}
