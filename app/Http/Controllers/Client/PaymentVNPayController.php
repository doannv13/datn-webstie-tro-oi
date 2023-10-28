<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentVNPayController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function payment_vnpay(Request $request)
{
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // url chuyển đến trang thanh toán
    $vnp_Returnurl = "http://127.0.0.1:8000/"; // url redirect sau khi thanh toán xong
    $vnp_TmnCode = "M4WVGGAX"; //Mã website tại VNPAY 
    $vnp_HashSecret = "GCJDLQSWQXFNASGVNESEOJRUUNQUZJYO"; //Chuỗi bí mật

    $vnp_TxnRef = 31; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán đơn hàng';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = 20000 * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $request->ip();
    
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
        "vnp_TxnRef" => $vnp_TxnRef

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
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    $returnData = array(
        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    );
    
    if (isset($request->redirect)) {
        header('Location: ' . $vnp_Url);
        exit();
    } else {
        // Xử lý thanh toán ở đây
        // Kiểm tra thanh toán thành công và lưu vào cơ sở dữ liệu
        // Ví dụ:
        $vnp_ResponseCode = $request->input('vnp_ResponseCode'); 
        if ($vnp_ResponseCode === '00') {
            $payment = new Transaction();
            $payment->user_id = auth()->user()->id;
            $payment->point = 10000;
            $payment->payment_method = 'VNPAY';
            $payment->status = 'pending';
            $payment->save();
            return view('payment-status.notification-pay');
        } else {
            // Xử lý khi thanh toán thất bại nếu cần
            // return view('payment-status.notification-fail');


        }

        return response()->json($returnData);
    }
}


}
