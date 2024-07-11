<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatuse;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    private $order;
    private $orderdetail;

    public function __construct(Order $order, OrderDetail $orderDetail)
    {
        $this->order = $order;
        $this->orderdetail = $orderDetail;
    }
    public function index(Request $request)
    {
        $search = $request->input('search_keyword');
        $status = OrderStatuse::get();

        $order = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $order = $this->order::select('*')
                ->where('order_code', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
            $order->setPath('order?search_keyword=' . $search);
        } else {
            $order = $this->order::latest()->paginate(15);

        }

        return view('admin.order.index', compact('order', 'status'));
    }
    public function view($id, Request $request)
    {
        $Order = $this->order->find($id);
        $OrderDetail = OrderDetail::join('products', 'products.id', '=', 'order_details.product_id')->where('order_id', $id)->get();
        $status = OrderStatuse::get();
        try {
            $dataCreate = [
                'status' => $request->status,
            ];
            $this->order->find($id)->update($dataCreate);

            // Update warehouse
            if ($request->status == 6) {
                foreach ($OrderDetail as $k => $v) {
                    $warehouse = Warehouse::where('product_id', $v->product_id)->first();
                    $inventory = $warehouse->quantity + $v->quantity;
                    $warehouse->update(['quantity' => $inventory]);
                }
            }

            return redirect()->route('order.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
        return view('admin.order.view', compact('Order', 'OrderDetail', 'status'));

    }

}
