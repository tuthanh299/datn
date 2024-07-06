<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    private $order;
    private $orderdetail;

    public function __construct(Order $order, OrderDetail $orderDetail){
        $this->order = $order;
        $this->orderdetail = $orderDetail;
    }
    public function index() 
    {
        $order = $this->order::latest()->paginate(10);
        return view('admin.order.index', compact('order'));
    }
    public function view($id)
    {
        $ImportOrder = $this->order->find($id);
        $ImportOrderdetail = OrderDetail::where('order_id', $id)->get();

        //return view('admin.order.view', compact('ImportOrder'));
        dd($ImportOrder, $ImportOrderdetail);
    }

    public function store(Request $request)
    {
        try {
            $dataCreate = [
                'orders_code' => $request->orders_code,
                'import_date' => $request->import_date,
                'total_price' => $request->total_price,
            ]; 
            $ImportOrder = $this->order->create($dataCreate);
            $import_order_id = $ImportOrder->id;
            $details = count($request->product_id);
            for ($i = 0; $i < $details; $i++) {
                $dataCreateImportOrderDetail = [
                    'import_order_id' => $import_order_id,
                    'product_id' => $request->product_id[$i],
                    'import_price' => $request->import_price[$i],
                    'quantity' => $request->quantity[$i],
                ];
                $this->orderdetail->create($dataCreateImportOrderDetail);
            }

            return redirect()->route('import_order.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
}
