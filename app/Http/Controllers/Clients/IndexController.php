<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\StaticNews;
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
        $productOutstanding = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')
            ->where('status', 1)
            ->where('outstanding', 1)
            ->get();

        return view('client.index', compact('sliders', 'news', 'productOutstanding', 'aboutus'));
    }

    public static function loadCategory()
    {
        $categories = Category::with('children')->where('parent_id', 0)->get();
        return response()->json(['categories' => $categories]);
    }
    public function getCategoryData(Request $request)
    {
        $categoryId = $request->input('categoryId');

        $products = Product::where('category_id', $categoryId)->get();

        if ($products->isEmpty()) {
            return response()->json(['error' => 'Không có sản phẩm nào trong danh mục này'], 404);
        }

        return response()->json(['products' => $products]);
    }

}
