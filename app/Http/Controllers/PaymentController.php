<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Service\PaymentService;
use YooKassa\Model\NotificationEventType;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use App\Enums\PaymentStatusEnum;

class PaymentController extends Controller
{
    public function index(){
        $transactions = Transaction::all();
        return view('main', ['transactions' => $transactions]);
    }

    public function create(Request $request, PaymentService $paymentService){
        $amount = $request->amount;
        $descr = 'Пополнение баланса';

        $transaction = Transaction::create([
            'amount' => $amount,
            'descr' => $descr
        ]);

        if($transaction){
            $link = $paymentService->createPayment($amount, $descr, [
                'transaction_id' => $transaction->id
            ]);
            return redirect()->away($link);
        }
        
        
    }

    public function callback(Request $request, PaymentService $paymentService){
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);


        $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody);
        
        $payment = $notification->getObject();
        if(isset($payment) && $payment->status === 'succeeded'){
            if($payment->paid === true){
                $metadata = (object)$payment->metadata;
                if(isset($metadata->transaction_id)){
                    $transactionId = $metadata->transaction_id;
                    $transaction = Transaction::find($transactionId);
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $transaction->save();
                }
            }
        }
    }
}