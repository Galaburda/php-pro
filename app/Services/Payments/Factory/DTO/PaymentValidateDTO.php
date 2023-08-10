<?php

namespace App\Services\Payments\Factory\DTO;

use App\Enums\PaymentsStatus;

class PaymentValidateDTO
{
    protected PaymentsStatus $status;
    protected string $orderId;
    protected string $paymentId;

    public function __construct($status, $orderId, $paymentId)
    {
        $this->status = $status;
        $this->orderId = $orderId;
        $this->paymentId = $paymentId;
    }
}
