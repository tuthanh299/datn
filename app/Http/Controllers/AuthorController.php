<?php

namespace App\Http\Controllers;

use function Laravel\Prompts\error;
use App\Http\Requests\AuthorAddRequest;
use App\Models\Author;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

 

class AuthorController extends Controller
{
    use StorageImageTrait,DeleteModelTrait;
    private $author;
    public function __construct(Author $author)
    {
        $this->author = $author;
    }
    public function index()
    {

        $authors = $this->author->latest()->paginate(5);
        return view('admin.author.index', compact('authors'));
    }
    public function create()
    {

        return view('admin.author.add');
    }
    public function store(AuthorAddRequest $request)
    {
        try {
            $dataCreate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataPhotoAuthor = $this->storagetrait($request, 'photo_path', 'author');

            if (!empty($dataPhotoAuthor)) {
                $dataCreate['photo_name'] = $dataPhotoAuthor['file_name'];
                $dataCreate['photo_path'] = $dataPhotoAuthor['file_path'];
            }
            $this->author->create($dataCreate);
            return redirect()->route('author.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        } 
    }
    public function edit($id)
    {
        $author = $this->author->find($id);
        return view('admin.author.edit', compact('author'));
    }
    public function update(Request $request, $id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataPhotoAuthor = $this->storagetrait($request, 'photo_path', 'author');
            if (!empty($dataPhotoAuthor)) {
                $dataUpdate['photo_name'] = $dataPhotoAuthor['file_name'];
                $dataUpdate['photo_path'] = $dataPhotoAuthor['file_path'];
            }
            $this->author->find($id)->update($dataUpdate);
            return redirect()->route('author.index');

        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());

        }
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->author);

    }
}
