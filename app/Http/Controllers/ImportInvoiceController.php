<?php

namespace App\Http\Controllers;

use App\Models\ImportInvoice;
use App\Models\ImportInvoiceDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImportInvoiceController extends Controller
{
    private $importinvoice;
    private $importinvoicedetail;
    public function __construct(ImportInvoice $importinvoice, ImportInvoiceDetail $importinvoicedetail)
    {
        $this->importinvoice = $importinvoice;
        $this->importinvoicedetail = $importinvoicedetail;
    }

    public function index()
    {
        $importinvoice = $this->importinvoice->latest()->paginate(15);
        return view('admin.import_invoice.index', compact('importinvoice'));
    }

    public function create()
    {
        $products = Product::select('id', 'name')->get();
        $ImportInvoiceCode = $this->generateImportInvoiceCode();
        $TimeCreateImportInvoice = $this->getTimeCreateImportInvoice();
        return view('admin.import_invoice.add', compact('ImportInvoiceCode', 'TimeCreateImportInvoice', 'products'));
    }
    public function store(Request $request)
    {
        try {
            $dataCreate = [
                'invoice_code' => $request->invoice_code,
                'import_date' => $request->import_date,
                'total_price' => $request->total_price,
            ];
            $importInvoice = $this->importinvoice->create($dataCreate);
            $import_invoice_id = $importInvoice->id;

            $details = count($request->product_id);
            for ($i = 0; $i < $details; $i++) {
                $dataCreateImportInvoiceDetail = [
                    'import_invoice_id' => $import_invoice_id,
                    'product_id' => $request->product_id[$i],
                    'import_price' => $request->import_price[$i],
                    'quantity' => $request->quantity[$i],
                ];
                $this->importinvoicedetail->create($dataCreateImportInvoiceDetail);
            }

            return redirect()->route('import_invoice.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function view($id)
    {
        $importinvoice = $this->importinvoice->find($id);
        $importinvoicedetail = ImportInvoiceDetail::where('import_invoice_id', $id)->get();

        return view('admin.import_invoice.view', compact('importinvoice'));
    }

    public function generateImportInvoiceCode()
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 20);
    }

    public function getTimeCreateImportInvoice()
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
