<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;

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
        $productOutstanding  = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')
            ->where('status', 1)
            ->orWhere(function ($query) {
                $query->where('status', 1)
                    ->where('outstanding', 1);
            })
            ->get(); 
        return view('index', compact('sliders', 'news', 'productOutstanding'));
    }

    public function getCategoryMenuHtml()
    {
        return $this->getCategoryMenu();
    }

    private function getCategoryMenu($parentId = null)
    {
        $categories = Category::where('parent_id', $parentId)->get();
        $html = '<ul>';
        foreach ($categories as $category) {
            $html .= '<li>' . $category->name;
            $children = $this->getCategoryMenu($category->id);
            if ($children) {
                $html .= $children;
            }
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

}
