<?php

namespace App\Http\Controllers;

use App\Models\ImportOrder;
use App\Models\ImportOrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImportOrderController extends Controller
{
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
        return view('admin.import_invoice.index', compact('ImportOrder'));
    }

    public function create()
    {
        $products = Product::select('id', 'name')->get();
        $ImportOrderCode = $this->generateImportOrderCode();
        $TimeCreateImportOrder = $this->getTimeCreateImportOrder();
        return view('admin.import_invoice.add', compact('ImportOrderCode', 'TimeCreateImportOrder', 'products'));
    }
    public function store(Request $request)
    {
        try {
            $dataCreate = [
                'invoice_code' => $request->invoice_code,
                'import_date' => $request->import_date,
                'total_price' => $request->total_price,
            ];
            $ImportOrder = $this->ImportOrder->create($dataCreate);
            $import_invoice_id = $ImportOrder->id;

            $details = count($request->product_id);
            for ($i = 0; $i < $details; $i++) {
                $dataCreateImportOrderDetail = [
                    'import_invoice_id' => $import_invoice_id,
                    'product_id' => $request->product_id[$i],
                    'import_price' => $request->import_price[$i],
                    'quantity' => $request->quantity[$i],
                ];
                $this->ImportOrderdetail->create($dataCreateImportOrderDetail);
            }

            return redirect()->route('import_invoice.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function view($id)
    {
        $ImportOrder = $this->ImportOrder->find($id);
        $ImportOrderdetail = ImportOrderDetail::where('import_invoice_id', $id)->get();

        return view('admin.import_invoice.view', compact('ImportOrder'));
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
