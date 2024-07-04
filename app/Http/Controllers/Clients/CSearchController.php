<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CSearchController extends Controller
{
    public function index(Request $request)
    {
        $pageName = 'Tìm kiếm';
        $search_type = $request->input('search_type');
        $search = $request->input('search_keyword');
        $searchresultproduct = null;
        $searchresultnews = null;

        if ($search_type == 'product') {
            if (!empty($search)) {
                $search = '%' . $search . '%';
                $searchresultproduct = Product::select('id', 'name', 'product_photo_path', 'regular_price', 'sale_price', 'discount')
                    ->where('name', 'LIKE', $search)->where('deleted_at', null)
                    ->latest()
                    ->paginate(10);
            }
        } else if ($search_type == 'news') {
            if (!empty($search)) {
                $search = '%' . $search . '%';
                $searchresultnews = News::select('id', 'name', 'description', 'photo_path')
                    ->where('name', 'LIKE', $search)->where('deleted_at', null)
                    ->latest()
                    ->paginate(8);
            }
        }

        if (Auth::guard('member')->check()) {
            $user = Auth::guard('member')->user();
            return view('client.product.search', compact('pageName', 'searchresultproduct', 'searchresultnews', 'user'));
        }

        return view('client.product.search', compact('pageName', 'searchresultproduct', 'searchresultnews'));
    }

}
