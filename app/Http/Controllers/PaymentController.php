<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DetailCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }

        $total = 0;
        $user = Auth::guard('member')->user();
        $cart = Cart::where('member_id', $user->id)->get();
        //$detail_cart = DetailCart::where('cart_id', $carts[0]->id)->get();
        $detail_cart = DetailCart::join('products', 'detail_carts.product_id', '=', 'products.id')->get();

        foreach ($detail_cart as $v) {
            if ($v->discount > 0) {
                $total += $v->sale_price * $v->quantity;
            } else {
                $total += $v->regular_price * $v->quantity;
            }
        }

        // $cart[0]->cart_total = $total;

        return view('client.order.payment', compact('detail_cart', 'user', 'cart'));
        //dd($carts);
    }

    public function vnpay_payment(Request $request)
    {
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }

        $total = 30000;

        foreach (session('cart') as $id => $details) {
            $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
        }

        $data = $request->all();
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        //$vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_Returnurl = "http://127.0.0.1:8000/vnpay_php/vnpay_return.php";
        $vnp_TmnCode = "X3G144O6"; //Mã website tại VNPAY
        $vnp_HashSecret = "BCYUDKCSUWNQTKGATYPCLZAGNRXFYUNF"; //Chuỗi bí mật

        $vnp_TxnRef = "111001"; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hoá đơn";
        $vnp_OrderType = "Bookstore";
        $vnp_Amount = $total * 100;
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
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
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
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }

    }

    public function cod_payment(Request $request)
    {
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }
        $orderInfo = new Cart;
        $total = 30000;

        foreach (session('cart') as $id => $details) {
            $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
        }

        $orderInfo->member_id = Auth::guard('member')->user()->id;
        // $orderInfo->name = $request->name;
        // $orderInfo->phone = $request->phone;
        // $orderInfo->address = $request->address;
        $orderInfo->cart_total = $total;
        $orderInfo->save();

        foreach (session('cart') as $id => $details) {
            $orderDetail = new DetailCart;

            $orderDetail->cart_id = $orderInfo->id;
            $orderDetail->product_id = $details['product_id'];
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->save();
        }

        session()->forget('cart');

        return redirect()->route('user.cart');
    }
}
