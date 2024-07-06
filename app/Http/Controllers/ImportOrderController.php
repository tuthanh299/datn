<?php

namespace App\Http\Controllers;

use App\Models\ImportOrder;
use App\Models\ImportOrderDetail;
use App\Models\Product;
use App\Models\Warehouse;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImportOrderController extends Controller
{
    use DeleteModelTrait;

    private $ImportOrder;
    private $ImportOrderdetail;
    public function __construct(ImportOrder $ImportOrder, ImportOrderDetail $ImportOrderdetail)
    {
        $this->ImportOrder = $ImportOrder;
        $this->ImportOrderdetail = $ImportOrderdetail;
    }

    public function index(Request $request)
    {
        $search = $request->input('search_keyword');
        $ImportOrder = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $ImportOrder = $this->ImportOrder::select('*')
                ->where('order_code', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
            $ImportOrder->setPath('import_order?search_keyword=' . $search);
        } else {
            $ImportOrder = $this->ImportOrder::latest()->paginate(15);
        }
        return view('admin.import_order.index', compact('ImportOrder'));
    }

    public function create()
    {
        $products = Product::select('id', 'name')->get();
        $ImportOrderCode = $this->generateImportOrderCode();
        $TimeCreateImportOrder = $this->getTimeCreateImportOrder();
        return view('admin.import_order.add', compact('ImportOrderCode', 'TimeCreateImportOrder', 'products'));
    }
    public function store(Request $request)
    {
        try {
            $dataCreate = [
                'order_code' => $request->order_code,
                'import_date' => $request->import_date,
                'total_price' => $request->total_price,
            ];
            $ImportOrder = $this->ImportOrder->create($dataCreate);
            $import_order_id = $ImportOrder->id;
            $details = count($request->product_id);

            for ($i = 0; $i < $details; $i++) {
                $dataCreateImportOrderDetail = [
                    'import_order_id' => $import_order_id,
                    'product_id' => $request->product_id[$i],
                    'import_price' => $request->import_price[$i],
                    'quantity' => $request->quantity[$i],
                ];
                $this->ImportOrderdetail->create($dataCreateImportOrderDetail);

                $product = Warehouse::find($request->product_id[$i]);
                $product->quantity = $product->quantity + $request->quantity[$i];
                $product->import_price = $request->import_price[$i];
                $product->save();
            }

            return redirect()->route('import_order.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function view($id)
    {
        $ImportOrder = $this->ImportOrder->find($id);
        $ImportOrderdetail = ImportOrderDetail::where('import_order_id', $id)->get();

        return view('admin.import_order.view', compact('ImportOrder'));
    }
    public function delete($id)
    {
        $ImportOrderDetail = ImportOrderDetail::where('import_order_id', $id)->get();
        $details = count($ImportOrderDetail);
        for ($i = 0; $i < $details; $i++) {
            $product = Warehouse::find($ImportOrderDetail[$i]->product_id);
            $product->quantity = $product->quantity - $ImportOrderDetail[$i]->quantity;
        $product->save();
        }
        return $this->deleteModelTrait($id, $this->ImportOrder);

    }
    public function generateImportOrderCode()
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 20);
    }

    public function getTimeCreateImportOrder()
    {
        return now()->setTimezone('Asia/Ho_Chi_Minh');
    }

    public function getProductId(Request $request)
    {
        $productIds = $request->query('productId');

        if (is_array($productIds)) {
            $products = Product::whereIn('id', $productIds)->get();
        }
        return response()->json(['products' => $products]);
    }

}
