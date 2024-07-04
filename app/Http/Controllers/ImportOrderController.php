<?php

namespace App\Http\Controllers;

use App\Models\ImportOrder;
use App\Models\ImportOrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;

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

    public function index()
    {
        $ImportOrder = $this->ImportOrder->latest()->paginate(15);
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
                'orders_code' => $request->orders_code,
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
