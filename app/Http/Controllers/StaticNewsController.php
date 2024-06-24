<?php

namespace App\Http\Controllers; 
use App\Http\Requests\StaticNewsEditRequest;
use App\Models\Staticnews;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Log;

class StaticNewsController extends Controller
{
    private $staticnews;
    public function __construct(Staticnews $staticnews)
    {
        $this->staticnews = $staticnews;
    }
    public function index()
    {
        $staticnews = $this->staticnews->first();
        return view('admin.aboutus.index', compact('staticnews'));
    }
    public function update(StaticNewsEditRequest $request)
    {
        try {
            $staticnews = $this->staticnews->first();
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
            ];
            $staticnews->update($dataUpdate);
            return redirect()->route('staticnews.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
}
