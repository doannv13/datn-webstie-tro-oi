<?php

namespace App\Http\Controllers\Client;

use App\Events\SuccessEvent;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentMomoController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function payment_momo(Request $request)
    {
        if (isset($_POST['payUrl'])) {
            // dd($request->all());
            $payment = new Transaction();
            $payment->user_id = auth()->user()->id;
            $payment->status = 'cancel';
            $payment->payment_method = 'momo';
            $payment->point_persent = $request->point_persent_momo;
            $payment->point = $request->old_total_amount_input_momo;
            $payment->price_promotion = $request->total_amount_input_momo;
            if ($request->coupon_id1) {
                $payment->coupon_id = $request->coupon_id1;
            } else {
                $payment->coupon_id = null;
            }
            $payment->verification = null;
            $payment->save();
            $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $serectkey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = "$request->total_amount_input_momo";
            $orderId = time() . "";
            $returnUrl = "http://datn-webstie-tro-oi.test/momo-return";
            $notifyurl = "http://datn-webstie-tro-oi.test/momo-return";
            $bankCode = "SML";
            $requestId = "$payment->id";
            $requestType = "payWithMoMoATM";
            $extraData = "";
            //before sign HMAC SHA256 signature
            $rawHashArr =  array(
                'partnerCode' => $partnerCode,
                'accessKey' => $accessKey,
                'requestId' => $requestId,
                'amount' => $amount,
                'orderInfo' => $orderInfo,
                'bankCode' => $bankCode,
                'returnUrl' => $returnUrl,
                'notifyUrl' => $notifyurl,
                'extraData' => $extraData,
                'requestType' => $requestType
            );
            // echo $serectkey;die;
            $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data =  array(
                'partnerCode' => $partnerCode,
                'partnerName' => 'testPartnerCode',
                'accessKey' => $accessKey,
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'returnUrl' => $returnUrl,
                'bankCode' => $bankCode,
                // 'resultCode' => $resultCode,
                'notifyUrl' => $notifyurl,
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            error_log(print_r($jsonResult, true));
            return redirect()->to($jsonResult['payUrl']);
        }
    }
    public function return_momo(Request $request)
    {
        if (isset($_GET['errorCode'])) {
            $errorCode = $_GET['errorCode'];
            $transaction = Transaction::where('id', $_GET['requestId'])->first();
            if ($transaction) {
                if ($errorCode == '0') {
                    $transaction->status = 'accept';
                    $transaction->verification = "trooi_momo_" . $_GET['requestId'];
                    $transaction->save();
                    $user = User::findOrFail($transaction->user_id);
                    $user->point += $transaction->point_persent;
                    $user->save();
                    if ($transaction->coupon_id) {
                        $coupon = Coupon::findOrFail($transaction->coupon_id);
                        $coupon->quantity = max(0, $coupon->quantity - 1);
                        $coupon->save();
                    }
                    event(new SuccessEvent($user));
                    $transactionId = $_GET['requestId'];
                    $price = $transaction->price_promotion;
                    $point = $transaction->point_persent;
                    return view('client.payment-status.notification-pay')->with(['transactionId' => $transactionId, 'price' => $price, 'point' => $point]);
                } else {
                    $transaction->verification = "Tro_oi_" . $_GET['requestId'];
                    $transaction->save();
                    return redirect()->route('notification-fail');
                }
            } else {
                // Handle the case when the transaction is not found
                // For example, you can redirect to an error page or show an error message
                return redirect()->route('notification-fail');
            }
        }
    }
}
