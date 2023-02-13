<?php

namespace App\Service;
use YooKassa\Client;

class PaymentService{
    
    private function getClient(): Client{
        $client = new Client();
        $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.secret_key'));
        return $client;
    }

    public function createPayment($amount, $descr, $options = []){
        $client = $this->getClient();
        $payment = $client->createPayment(
            [
                'amount' => [
                    'value' => $amount,
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => route('payment.callback'),
                ],
                'capture' => false,
                'description' => 'Заказ №1',
                'metadata' => [
                    'transaction_id' => $options['transaction_id'],
                ]
            ],
            uniqid('', true)
        );
        return $payment->getConfirmation()->getConfirmationUrl();
    }
}