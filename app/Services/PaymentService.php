<?php

namespace App\Services;
use YooKassa\Client;

class PaymentService{
    
    public function getClient(): Client{
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
                    'return_url' => route('my.courses'),
                ],
                'capture' => false,
                'description' => $descr,
                'metadata' => [
                    'transaction_id' => $options['transaction_id'],
                ]
            ],
            uniqid('', true)
        );
        return $payment->getConfirmation()->getConfirmationUrl();
    }
}