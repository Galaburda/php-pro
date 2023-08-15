<?php

namespace App\Services\Payments\Factory;

use App\Services\Payments\Factory\DTO\MakePaymentDTO;

interface PaymentInterface
{


    public function validatePayment(string $paymentId);

    public function createPayment(MakePaymentDTO $paymentDTO): string;
}
