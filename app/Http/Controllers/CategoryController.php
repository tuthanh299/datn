<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Traits\DeleteModelTrait;

class CategoryController extends Controller
{
    use DeleteModelTrait;

    private $category;
    public function __construct(Category $category)
    {

        $this->category = $category;
    }
    public function create()
    {
        $categoryoption = $this->getCategory($parentId ='');
        return view('admin.category.add', compact('categoryoption'));
    }
    public function index()
    {
        $categories = $this->category->latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }
    public function store(CategoryAddRequest $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            
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
        return view('admin.category.edit', compact('category', 'categoryoption'));
    }
    public function update($id, CategoryEditRequest $request)
    {

        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
          
        ]);
        return redirect()->route('categories.index');

    }
    public function delete($id)
    {
        
        return $this->deleteModelTrait($id,$this->category);

    }
    
}
