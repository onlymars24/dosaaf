<?php

namespace App\Http\Controllers;


use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Enums\PaymentStatusEnum;
use App\Services\PaymentService;
use App\Services\CourseUserService;
use YooKassa\Model\NotificationEventType;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;

class PaymentController extends Controller
{
    public function create(Request $request, PaymentService $paymentService){
        $amount = $request->amount;
        $descr = $request->descr;

        $transaction = Transaction::create([
            'amount' => $amount,
            'descr' => $descr,
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
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

        $notification = (isset($requestBody['event']) && $requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody);
        $payment = $notification->getObject();

        if(isset($payment->status) && $payment->status === 'waiting_for_capture'){
             $paymentService->getClient()->capturePayment([
                'amount' => $payment->amount,
            ], $payment->id, uniqid('', true));
        }

        if(isset($payment) && $payment->status === 'succeeded'){
            if($payment->paid === true){
                $metadata = (object)$payment->metadata;
                if(isset($metadata->transaction_id)){
                    $transactionId = $metadata->transaction_id;
                    $transaction = Transaction::find($transactionId);
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $transaction->save();
                    CourseUserService::giveAccess($transaction->course_id, $transaction->user_id);
                }
            }
        }
    }
}