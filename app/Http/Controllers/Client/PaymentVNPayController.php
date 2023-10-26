<?php

namespace App\Http\Controllers\Client;

use App\Events\SuccessEvent;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentVNPayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function payment_vnpay(Request $request)
    {
        if (isset($_POST['redirect'])) {
            $payment = new Transaction();
            $payment->user_id = auth()->user()->id;
            $payment->status = 'pending';
            $payment->payment_method = 'vnpay';
            $payment->point = $request->old_total_amount_input;
            $payment->price_promotion = $request->total_amount_input;
            $payment->verification = null;
            $payment->save();
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // url chuyển đến trang thanh toán
            $vnp_Returnurl = "http://datn-webstie-tro-oi1.test/vnpay-return"; // url redirect sau khi thanh toán xong
            $vnp_TmnCode = "M4WVGGAX"; //Mã website tại VNPAY 
            $vnp_HashSecret = "GCJDLQSWQXFNASGVNESEOJRUUNQUZJYO"; //Chuỗi bí mật

            // $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_TxnRef = $payment->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            // $vnp_OrderInfo = $_POST['order_desc']; // thông tin đơn
            $vnp_OrderInfo = 'Thanh toán đơn hàng';
            // $vnp_OrderType = $_POST['order_type'];
            $vnp_OrderType = 'billpayment';
            // $vnp_Amount = $_POST['amount'] * 100;
            $vnp_Amount = $request->total_amount_input * 100;
            // $vnp_Locale = $_POST['language'];
            $vnp_Locale = 'vn';
            // $vnp_BankCode = $_POST['bank_code'];
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = $_POST['txtexpire'];

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
                // "vnp_ExpireDate" => $vnp_ExpireDate
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
            // $returnData = array(
            //     'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            // );


            // $paymentId = $payment->id;
            // dd($paymentId);
            session()->start();

            // Session::put('payment_id', $paymentId);
            header('Location: ' . $vnp_Url);
            die();
        }
        // vui lòng tham khảo thêm tại code demo
    }
    /**
     * Show the form for creating a new resource.
     */
    public function return_vnpay(Request $request)
    {
        if (isset($_GET['vnp_ResponseCode'])) {
            $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
            if ($vnp_ResponseCode == '00') {
                // Tìm đối tượng thanh toán dựa trên điều kiện nào đó, chẳng hạn $vnp_TxnRef
                $transaction = Transaction::where('id', $_GET['vnp_TxnRef'])->first();
                // dd($_GET['vnp_Amount']);
                if ($transaction) {
                    // Cập nhật trạng thái thành 'accept'
                    $transaction->status = 'accept';
                    $transaction->save();
                    // $transaction->status = $newStatus;
                    // toastr()->success('Chỉnh sửa thành công', 'thành công');
                    $user = User::findOrFail($transaction->user_id);
                    if ($transaction->price_promotion < 300000) {
                        $user->point += ($transaction->price_promotion + (5 / 100) * $transaction->price_promotion) / 1000;
                    } elseif ($transaction->price_promotion >= 300000 && $transaction->price_promotion < 1000000) {
                        $user->point += ($transaction->price_promotion + (7 / 100) * $transaction->price_promotion) / 1000;
                    } elseif ($transaction->price_promotion >= 1000000 && $transaction->price_promotion <= 2000000) {
                        $user->point += ($transaction->price_promotion + (10 / 100) * $transaction->price_promotion) / 1000;
                    }
                    $user->save();
                    event(new SuccessEvent($user));
                }

                // Sau khi cập nhật xong, bạn có thể chuyển hướng hoặc hiển thị thông báo
                return redirect()->route('notification-pay');
            } else {
                return redirect()->route('notification-fail');
            }
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
