<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Controllers\PublisherController;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Publisher;
use App\Models\Warehouse;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use function Laravel\Prompts\error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    use StorageImageTrait, DeleteModelTrait;
    private $category;
    private $product;
    private $productGallery;
    private $publisherController;
    private $warehouse;
    public function __construct(Category $category, Product $product, Warehouse $warehouse, ProductGallery $productGallery, PublisherController $publisherController)
    {
        $this->category = $category;
        $this->product = $product;
        $this->warehouse = $warehouse;
        $this->productGallery = $productGallery;
        $this->publisherController = $publisherController;
    }
    public function index()
    {
        $products = $this->product->latest()->paginate(10);
        return view('admin.product.index', compact('products'));
    }
    /* Warehouse */
   // Trong controller của bạn
    public function warehouse()
    {
        $warehouse = $this->warehouse->latest()->paginate(10);

        // Lấy thông tin sản phẩm cho từng kho hàng
        foreach ($warehouse as $warehouseItem) {
            $product = Product::find($warehouseItem->product_id);
            $warehouseItem->product_name = $product ? $product->name : 'Không tìm thấy sản phẩm';
            $warehouseItem->product_photo_path = $product ? $product->product_photo_path : 'Đường dẫn ảnh mặc định';
        }

        return view('admin.warehouse.index', compact('warehouse'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        $publishers = $this->publisherController->getPublishers();
        return view('admin.product.add', compact('htmlOption', 'publishers'));
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
            $product_id = $product->id; 
            $dataWarehouseCreate = [
                'product_id' => $product_id, 
            ]; 
            $this->warehouse->create($dataWarehouseCreate); 
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
        return view('admin.product.edit', compact('htmlOption', 'product', 'publishers'));
    }

    public function update(ProductEditRequest $request, $id)
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
