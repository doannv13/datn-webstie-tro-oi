<?php

namespace App\Http\Controllers\Client;

use App\Events\CancelEvent;
use App\Events\NotificationEvent;
use App\Events\SuccessEvent;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Transaction::with('user')
            ->where('action', 'import')
            ->latest()
            ->paginate(10);
        return view('admin.transaction.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Transaction();
        $model->fill($request->all());
        $model->point = (int)str_replace(',', '', $model->point);
        $model->action = 'import';
        $model->save();
        toastr()->success('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.', 'Đơn hàng sẽ được xác nhận sớm');
        if ($model->action === 'import') {
            event(new NotificationEvent($request->verification));
        }
        return back();
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
    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $model = Transaction::find($id);
        $model->status = $newStatus;
        $model->save();
        toastr()->success('Chỉnh sửa thành công', 'thành công');
        if ($newStatus === 'accept') {
            $user = User::findOrFail($model->user_id);
            if ($model->point < 300000) {
                $user->point += ($model->point + (5 / 100) * $model->point) / 1000;
            } elseif ($model->point >= 300000 && $model->point < 1000000) {
                $user->point += ($model->point + (7 / 100) * $model->point) / 1000;
            } elseif ($model->point >= 1000000 && $model->point <= 2000000) {
                $user->point += ($model->point + (10 / 100) * $model->point) / 1000;
            }
            $user->save();
            event(new SuccessEvent($user));
        } elseif ($newStatus === 'cancel') {
            $user = User::findOrFail($model->user_id);
            event(new CancelEvent($user));
        }
        return back();
    }
    public function history()
    {
        $data = Transaction::with('user')
            ->where('user_id', auth()->user()->id)
            ->paginate(10);
        return view('client.transaction.historyPoint', compact('data'));
    }


    public function vnpayPayment(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://datn-webstie-tro-oi.test/";
        $vnp_TmnCode = "MY8CCKJA"; //Mã website tại VNPAY 
        $vnp_HashSecret = "BDRIWDFLMDXAEXFDDZNCLHQPCOKZGMAD"; //Chuỗi bí mật

        $vnp_TxnRef = '1234s'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'bill payment';
        $vnp_Amount = $request->totals;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
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
        if (isset($_POST['thanhtoan'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
}
