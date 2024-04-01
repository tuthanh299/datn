<?php

namespace App\Http\Controllers;

use function Laravel\Prompts\error;
use App\Http\Requests\PublisherAddRequest;
use App\Models\Publisher;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

 

class PublisherController extends Controller
{
    use StorageImageTrait,DeleteModelTrait;
    private $publisher;
    public function __construct(Publisher $publisher)
    {
        $this->publisher = $publisher;
    }
    public function index()
    { 
        $publishers = $this->publisher->latest()->paginate(5);
        return view('admin.publisher.index', compact('publishers'));
    }
    public function create()
    {

        return view('admin.publisher.add');
    }
    public function store(PublisherAddRequest $request)
    {
        try {
            $dataCreate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataPhotoPublisher = $this->storagetrait($request, 'photo_path', 'publisher');

            if (!empty($dataPhotoPublisher)) {
                $dataCreate['photo_name'] = $dataPhotoPublisher['file_name'];
                $dataCreate['photo_path'] = $dataPhotoPublisher['file_path'];
            }
            $this->publisher->create($dataCreate);
            return redirect()->route('publisher.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        } 
    }
    public function edit($id)
    {
        $publisher = $this->publisher->find($id);
        return view('admin.publisher.edit', compact('publisher'));
    }
    public function update(Request $request, $id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataPhotoPublisher = $this->storagetrait($request, 'photo_path', 'publisher');
            if (!empty($dataPhotoPublisher)) {
                $dataUpdate['photo_name'] = $dataPhotoPublisher['file_name'];
                $dataUpdate['photo_path'] = $dataPhotoPublisher['file_path'];
            }
            $this->publisher->find($id)->update($dataUpdate);
            return redirect()->route('publisher.index');

        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());

        }
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->publisher);

    }
}
