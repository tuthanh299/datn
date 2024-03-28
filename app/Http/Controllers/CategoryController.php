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
        $categoryoption = $this->getCategory($parentId ='');
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
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $categoryoption = $recusive->categoryRecusive($parentId);
        return $categoryoption;
    }   

    public function edit($id)
    {
        $category = $this->category->find($id);
        $categoryoption = $this->getCategory($category->parent_id);
        return view('category.edit', compact('category', 'categoryoption'));
    }
    public function update($id, Request $request)
    {

        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('categories.index');

    }
    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
