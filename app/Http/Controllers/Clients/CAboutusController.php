<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\StaticNews;

class CAboutusController extends Controller
{
    public function index()
    {
        $firstRecord = StaticNews::select('name', 'content')->first();
        if ($firstRecord) {
            $pageName = $firstRecord->name;
            $aboutus = $firstRecord->content;
        } else {
            $pageName = 'Về chúng tôi';
            $aboutus = 'Nội dung đang cập nhật';
        }   
       
        return view('client.aboutus.index', compact('pageName', 'aboutus'));
    }
}
