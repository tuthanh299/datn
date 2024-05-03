<?php

namespace App\Http\Controllers;

use function Laravel\Prompts\error;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Http\Controllers\PublisherController;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Publisher;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function index() 
    {
        /*$products = Product::all();*/
        $products = $this->product->paginate(10);
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        $publishers = $this->publisherController->getPublishers();
        return view('admin.product.add', compact('htmlOption','publishers'));
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'discount' => $request->discount,
                'publisher_id' => $request->publisher_id,
                'author' => $request->author,
                'code' => $request->code,
                'publishing_year' => $request->publishing_year,
                'status' => $request->filled('status') ? $request->status : false,
                'outstanding' => $request->filled('outstanding') ? $request->outstanding : false,
                'category_id' => $request->category_id,
            ];
            $dataUploadProductImage = $this->storagetrait($request, 'product_photo_path', 'product');
            if (!empty($dataUploadProductImage)) {
                $dataProductCreate['product_photo_name'] = $dataUploadProductImage['file_name'];
                $dataProductCreate['product_photo_path'] = $dataUploadProductImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            
            /* Sub img */
            if ($request->hasFile('photo_path')) {
                foreach ($request->photo_path as $fileItem) {
                    $dataProductGallery = $this->storagetraitmultiple($fileItem, 'product');
                    $product->images()->create([
                        'product_id' => $product->id,
                        'photo_path' => $dataProductGallery['file_path'],
                        'photo_name' => $dataProductGallery['file_name'],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        } 
    }

    public function edit($id)
    { 
        $product = $this->product->find($id);
        $publishers = Publisher::all();
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product','publishers'));
    }
     
    
    public function update(Request $request, $id)
    {

        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'discount' => $request->discount,
                'publisher_id' => $request->publisher_id,
                'author' => $request->author,
                'code' => $request->code,
                'publishing_year' => $request->publishing_year,
                'status' => $request->filled('status') ? $request->status : false,
                'outstanding' => $request->filled('outstanding') ? $request->outstanding : false,
                'category_id' => $request->category_id,
            ];
            $dataUploadProductImage = $this->storagetrait($request, 'product_photo_path', 'product');
            if (!empty($dataUploadProductImage)) {
                $dataProductUpdate['product_photo_name'] = $dataUploadProductImage['file_name'];
                $dataProductUpdate['product_photo_path'] = $dataUploadProductImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            /* Sub img */
            if ($request->hasFile('photo_path')) {
                $this->productGallery->where('product_id', $id)->delete();
                foreach ($request->photo_path as $fileItem) {
                    $dataProductGallery = $this->storagetraitmultiple($fileItem, 'product');
                    $product->images()->create([
                        'product_id' => $product->id,
                        'photo_path' => $dataProductGallery['file_path'],
                        'photo_name' => $dataProductGallery['file_name'],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->product);

    }

}
