<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsAddRequest;
use App\Http\Requests\NewsEditRequest;
use App\Models\News;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use function Laravel\Prompts\error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $news;
    public function __construct(News $news)
    {
        $this->news = $news;
    }
    public function index(Request $request)
    {
        $search = $request->input('search_keyword');
        $newspost = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $newspost = $this->news::select('id', 'name', 'photo_path')
                ->where('name', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
            $newspost->setPath('news?search_keyword=' . $search);
        } else {
            $newspost = $this->news::latest()->paginate(10);
        }
        return view('admin.news.index', compact('newspost'));
    }
    public function create()
    {

        return view('admin.news.add');
    }
    public function store(NewsAddRequest $request)
    {
        try {
            $dataCreate = [
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->filled('status') ? $request->status : false,
                'outstanding' => $request->filled('outstanding') ? $request->outstanding : false,
            ];
            $dataPhotoNews = $this->storagetrait($request, 'photo_path', 'news');

            if (!empty($dataPhotoNews)) {
                $dataCreate['photo_name'] = $dataPhotoNews['file_name'];
                $dataCreate['photo_path'] = $dataPhotoNews['file_path'];
            }
            $this->news->create($dataCreate);
            return redirect()->route('news.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function edit($id)
    {
        $news = $this->news->find($id);
        return view('admin.news.edit', compact('news'));
    }
    public function update(NewsEditRequest $request, $id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->filled('status') ? $request->status : false,
                'outstanding' => $request->filled('outstanding') ? $request->outstanding : false,
            ];
            $dataPhotoNews = $this->storagetrait($request, 'photo_path', 'news');
            if (!empty($dataPhotoNews)) {
                $dataUpdate['photo_name'] = $dataPhotoNews['file_name'];
                $dataUpdate['photo_path'] = $dataPhotoNews['file_path'];
            }
            $this->news->find($id)->update($dataUpdate);
            return redirect()->route('news.index');

        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());

        }
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->news);

    }
}
