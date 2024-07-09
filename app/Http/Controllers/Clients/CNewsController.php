<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class CNewsController extends Controller
{
    public function index()
    {
        $newsInternal = News::select('id', 'name', 'description', 'photo_path')->where('status', 1)->whereNull('deleted_at')->latest()->paginate(8); 
        return view('client.news.index', compact('newsInternal'));
    }

    public function detail($id)
    {
        $newsDetail = News::find($id);
        $pageName = $newsDetail->name;
        $newsInternal = News::select('id', 'name', 'description', 'photo_path')->get();
        
        return view('client.news.detail', compact('newsDetail', 'newsInternal', 'pageName'));
    }

}
