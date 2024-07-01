<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DetailCart;
use App\Models\SaleInvoice;
use App\Models\SaleInvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index() 
    {
        if(!Auth::guard('member')->check()) 
        {
            return redirect()->route('user.login');
        }
        
        $total = 0;
        $user = Auth::guard('member')->user();
        $cart = Cart::where('member_id', $user->id)->get();
        //$detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();
        $detail_cart = DetailCart::join('products', 'detail_carts.product_id', '=', 'products.id')->get();

        foreach($detail_cart as $v) {
            if($v->discount >0) {
                $total += $v->sale_price * $v->quantity;
            } 
            else {
                $total += $v->regular_price * $v->quantity;
            }
        }

        $cart[0]->cart_total = $total;

        return view('client.order.payment', compact('detail_cart', 'user', 'cart'));
        //dd($carts);
    }

    public function vnpay_payment(Request $request) 
    {
        if(!Auth::guard('member')->check()) 
        {
            return redirect()->route('user.login');
        }

        $data = $request->all();
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        //$vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_Returnurl = "http://127.0.0.1:8000/vnpay_php/vnpay_return.php";
        $vnp_TmnCode = "X3G144O6";//Mã website tại VNPAY 
        $vnp_HashSecret = "BCYUDKCSUWNQTKGATYPCLZAGNRXFYUNF"; //Chuỗi bí mật

        $vnp_TxnRef = "111001"; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hoá đơn";
        $vnp_OrderType = "Bookstore";
        $vnp_Amount = $data['total'] * 100;
        $vnp_Locale = "vi-VN";
        $vnp_BankCode = "";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
                //dd('Thanh toan thanh cong', $vnp_Url);
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo		
            }

    public function momo_payment(Request $request) 
    {
        if(!Auth::guard('member')->check()) 
        {
            return redirect()->route('user.login');
        }
        
    }

    public function cod_payment(Request $request) 
    {
        if(!Auth::guard('member')->check()) 
        {
            return redirect()->route('user.login');
        }
        $all = $request->all();
        $fullname = $all['fullname'];
        $address = $all['address'];
        $phone = $all['phone'];
        $note = $all['note'];
        $total = $all['total'];
        //dd($all, $fullname, $address, $phone, $note, $total);
        $user = Auth::guard('member')->user();
        $cart = Cart::where('member_id', $user->id)->get();
        //$detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();
        $detail_cart = DetailCart::join('products', 'detail_carts.product_id', '=', 'products.id')->get();
        

        //Kiểm tra thông tin tuỳ chỉnh có hay không
        /*if($address == null || $phone == null || $fullname == null) 
        {
            $full_name = $user->lastname . ' ' . $user->firstname;
            //tạo hoá đơn rỗng lưu dữ liệu người dùng
            $sale_invoice = SaleInvoice::create([
                'member_id' => $user->id,
                'user_id' => $user->id,
                'total_price' => $total,
                'fullname'=> $full_name,
                'address' => $user->address,
                'phone' => $user->phone,
                'paid_status' => 0,
                'shipping_status' => 0,
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            dd($sale_invoice);
        } 
        else 
        {
            //tạo hoá đơn rỗng lưu dữ liệu người dùng
            $sale_invoice = SaleInvoice::create([
                'member_id' => $user->id,
                'user_id' => $user->id,
                'total_price' => $total,
                'fullname'=> $fullname,
                'address' => $address,
                'phone' => $phone,
                'paid_status' => 0,
                'shipping_status' => 0,
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            dd($sale_invoice);
        }*/

        $sale_invoice = SaleInvoice::create([
            'member_id' => $user->id,
            'user_id' => $user->id,
            'total_price' => $total,
            'fullname'=> $fullname,
            'address' => $address,
            'phone' => $phone,
            'paid_status' => 0,
            'shipping_status' => 0,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        //dd($sale_invoice);

        $sale_invoice_id = $sale_invoice->id;
        $detail = new SaleInvoiceDetail();

        foreach($detail_cart as $v) {
            $detail->sale_invoice_id = $sale_invoice_id;
            $detail->product_id = $v->product_id;
            $detail->quantity = $v->quantity;
            $detail->price = $v->sale_price;
            $detail->save();
        }

        if($detail) 
        {
            dd('success');
        }

        dd('fail');
        

    }
}