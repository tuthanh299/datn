<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order;

    public function __construct(Order $order){
        $this->order = $order;
    }
    public function index() 
    {
        $order = $this->order::latest()->paginate(10);
        return view('admin.order.index', compact('order'));
    }
}
