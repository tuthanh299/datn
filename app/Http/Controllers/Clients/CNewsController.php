<?php
namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\News;

class CNewsController extends Controller
{
    public function index()
    {
        $newsInternal = News::select('id', 'name', 'description', 'photo_path')->get();
        return view('client.news.index', compact('newsInternal'));
    }

    public function detail($id)
    {
        $newsDetail = News::find($id); 
        $newsInternal = News::select('id', 'name', 'description', 'photo_path')->get();
        return view('client.news.detail', compact('newsDetail','newsInternal'));
    }

}
