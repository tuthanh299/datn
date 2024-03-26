<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {

        $this->category = $category;
    }
    public function create()
    {
        $data = $this->category->all();
        $recusive = new Recusive($data); 
        $categoryoption = $recusive->categoryRecusive();  
        return view('category.add', compact('categoryoption'));
        
       
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(10);
        return view('category.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('categories.index');
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('category.edit',compact('category'));
    }
    public function delete($id)
    {
        https://www.youtube.com/watch?v=0nZ3sR-eluE&list=PL3V6a6RU5ogEAKIuGjfPEJ77FGmEAQXTT&index=11 17.57
    }
}
