<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Http\Requests\SliderEditRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use function Laravel\Prompts\error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index(Request $request)
    {


        $search = $request->input('search_keyword'); 
        $sliders = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $sliders = $this->slider::select('id', 'name', 'description', 'photo_path')
                ->where('name', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
            $sliders->setPath('slider?search_keyword=' . $search);

        } else {
            $sliders = $this->slider->latest()->paginate(10);
        } 

        return view('admin.slider.index', compact('sliders'));
    }
    public function create()
    {

        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request)
    {
        try {
            $dataCreate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataPhotoSlider = $this->storagetrait($request, 'photo_path', 'slider');

            if (!empty($dataPhotoSlider)) {
                $dataCreate['photo_name'] = $dataPhotoSlider['file_name'];
                $dataCreate['photo_path'] = $dataPhotoSlider['file_path'];
            }
            $this->slider->create($dataCreate);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(SliderEditRequest $request, $id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataPhotoSlider = $this->storagetrait($request, 'photo_path', 'slider');
            if (!empty($dataPhotoSlider)) {
                $dataUpdate['photo_name'] = $dataPhotoSlider['file_name'];
                $dataUpdate['photo_path'] = $dataPhotoSlider['file_path'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider.index');

        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());

        }
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->slider);

    }
}
