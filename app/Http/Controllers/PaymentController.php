<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }

        if (count(session('cart')) == 0) {
            return redirect()->route('user.cart');
        }

        $total = 0;
        $user = Auth::guard('member')->user();

        return view('client.order.payment', compact('user'));

    }

    public function combination(Request $request) {
        
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }

        $data = $request->all();
        //dd($request['type']);

        $request->merge([
            'fullname_vnpay' => $request->fullname,
            'address_vnpay' => $request->address,
            'phone_vnpay' => $request->phone,
            'note_vnpay' => $request->note,
        ]);

        $total = 30000;

        $order_code = $this->generateOrderCode();

        //controller thanh toán vnpay
        if ($request['type'] === 'payment_vnpay') {

            $orderInfo = new Order();
            foreach (session('cart') as $id => $details) {
                $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
            }
    
            //$member = Member::where('id', Auth::guard('member')->user()->id);
            $orderInfo->order_code = $order_code;
            $orderInfo->member_id = Auth::guard('member')->user()->id;
            $orderInfo->fullname = $request->fullname;
            $orderInfo->phone = $request->phone;
            $orderInfo->address = $request->address;
            $orderInfo->note = $request->note;
            $orderInfo->total_price = $total;
            $orderInfo->status = 1;
            $orderInfo->save();

            foreach (session('cart') as $id => $details) {
                $orderDetail = new OrderDetail;
    
                $orderDetail->order_id = $orderInfo->id;
                $orderDetail->product_id = $details['product_id'];
                $orderDetail->quantity = $details['quantity'];
                $orderDetail->regular_price = $details['regular_price'];
                $orderDetail->sale_price = $details['sale_price'];
                $orderDetail->save();
    
                $warehouse = Warehouse::where('product_id', $details['product_id'])->first();
                $warehouse->quantity -= $details['quantity'];
                $warehouse->save();
            }

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            //$vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
            //$vnp_Returnurl = "http://127.0.0.1:8000/vnpay_return";
            $vnp_Returnurl = route('vnpay.return');
            $vnp_TmnCode = "X3G144O6"; //Mã website tại VNPAY
            $vnp_HashSecret = "BCYUDKCSUWNQTKGATYPCLZAGNRXFYUNF"; //Chuỗi bí mật

            //$vnp_TxnRef = "111001"; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            //$vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
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
                "vnp_CreateDate" => now()->format('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $order_code,
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
            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url,
            );
            if (isset($_POST['type'])) {
                header('Location: ' . $vnp_Url);
                die();
                //dd('Thanh toan thanh cong', $vnp_Url);
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
        }
        // controller thanh toán cod
        else if($request->input('type') === 'payment') {
            $orderInfo = new Order;
            foreach (session('cart') as $id => $details) {
                $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
            }
    
            //$member = Member::where('id', Auth::guard('member')->user()->id);
            $orderInfo->order_code = $order_code;
            $orderInfo->member_id = Auth::guard('member')->user()->id;
            $orderInfo->fullname = $request->fullname;
            $orderInfo->phone = $request->phone;
            $orderInfo->address = $request->address;
            $orderInfo->note = $request->note;
            $orderInfo->total_price = $total;
            $orderInfo->status = 1;
            $orderInfo->save();
    
            foreach (session('cart') as $id => $details) {
                $orderDetail = new OrderDetail;
    
                $orderDetail->order_id = $orderInfo->id;
                $orderDetail->product_id = $details['product_id'];
                $orderDetail->quantity = $details['quantity'];
                $orderDetail->regular_price = $details['regular_price'];
                $orderDetail->sale_price = $details['sale_price'];
                $orderDetail->save();
    
                $warehouse = Warehouse::where('product_id', $details['product_id'])->first();
                $warehouse->quantity -= $details['quantity'];
                $warehouse->save();
            }

            foreach (session('cart') as $id => $details) {
                $warehouse = Warehouse::where('product_id', $details['product_id'])->first();
                $warehouse->quantity -= $details['quantity'];
            }

            session()->forget('cart');
            return redirect()->route('user.cart')->with('notify', [
                'status' => 'success',
                'message' => 'Thanh toán thành công'
            ]);
            // thanh toán vietqr
        } else {
            $orderInfo = new Order();
            foreach (session('cart') as $id => $details) {
                $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
            }
    
            //$member = Member::where('id', Auth::guard('member')->user()->id);
            $orderInfo->order_code = $order_code;
            $orderInfo->member_id = Auth::guard('member')->user()->id;
            $orderInfo->fullname = $request->fullname;
            $orderInfo->phone = $request->phone;
            $orderInfo->address = $request->address;
            $orderInfo->note = $request->note;
            $orderInfo->total_price = $total;
            $orderInfo->status = 1;
            $orderInfo->save();
    
            foreach (session('cart') as $id => $details) {
                $orderDetail = new OrderDetail;
    
                $orderDetail->order_id = $orderInfo->id;
                $orderDetail->product_id = $details['product_id'];
                $orderDetail->quantity = $details['quantity'];
                $orderDetail->regular_price = $details['regular_price'];
                $orderDetail->sale_price = $details['sale_price'];
                $orderDetail->save();
    
                $warehouse = Warehouse::where('product_id', $details['product_id'])->first();
                $warehouse->quantity -= $details['quantity'];
                $warehouse->save();
            }

            foreach (session('cart') as $id => $details) {
                $warehouse = Warehouse::where('product_id', $details['product_id'])->first();
                $warehouse->quantity -= $details['quantity'];
            }

            Order::where('order_code', $order_code)->update([
                'status' => 2,
            ]);
            foreach (session('cart') as $id => $details) {
                $warehouse = Warehouse::where('product_id', $details['product_id'])->first();
                $warehouse->quantity -= $details['quantity'];
            }

            session()->forget('cart');
            return redirect()->route('user.cart')->with('notify', [
                'status' => 'success',
                'message' => 'Thanh toán thành công'
            ]);
        }

        //session()->forget('cart');
        return redirect()->route('user.cart')->with('notify', [
            'status' => 'error',
            'message' => 'Thanh toán không thành công'
        ]);
    }

    public function return (Request $request)
    {
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }
        if ($request->vnp_ResponseCode == "00") {
            //dd($request->all());
            //dd($request->all(), session('cart'));
            Order::where('order_code', $request->vnp_TxnRef)->update([
                'status' => 2,
            ]); 

            foreach (session('cart') as $id => $details) {
                $warehouse = Warehouse::where('product_id', $details['product_id'])->first();
                $warehouse->quantity -= $details['quantity'];
            }
            session()->forget('cart');
            return redirect()->route('user.cart')->with('notify', [
                'status' => 'success',
                'message' => 'Thanh toán thành công'
            ]);
            //dd('Đã thanh toán phí dịch vụ');
        }

        $hdb = Order::where('order_code', $request->vnp_TxnRef)->get();

        $cthdb = OrderDetail::where('order_id', $hdb->id)->get();

        foreach($cthdb as $v) {
            $v->delete();
        }

        $hdb->delete();

        //session()->forget('url_prev');
        //return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
        return redirect()->route('user.cart')->with('notify', [
            'status' => 'error',
            'message' => 'Thanh toán không thành công'
        ]);
    }

    public function generateOrderCode()
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 20);
    }
}
