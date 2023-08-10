<?php

namespace App\Repositories\Payments;

use Illuminate\Support\Facades\DB;

class PaymentResultRepository
{
    public function store(string $paymentId, bool $success)
    {
        DB::table('order_payment_result')->insert([
            'payment_id' => $paymentId,
            'success' => $success,
        ]);
    }
}
