<?php

namespace App\Repositories\Payments;

use App\Services\Payments\ConfirmPayment\ConfirmPaymentDTO;
use Illuminate\Support\Facades\DB;

class PaymentResultRepository
{

    public function store(ConfirmPaymentDTO $confirmPaymentDTO)
    {
        DB::table('order_payment_result')->insert([
            'user_id' => 999,
            'payment_system' => $confirmPaymentDTO->getPayments(),
            'order_id' => $confirmPaymentDTO->getOrderId(),
            'payment_id' => 124124,
            //
            'success' => 1,
            'amount' => 15,
            // в масиві який приходить від paypal сервера не зміг знайти суму
            'currency' => 1,
            'payer_id' => $confirmPaymentDTO->getPayerId(),
            'email' => $confirmPaymentDTO->getEmail(),
        ]);
    }
}
