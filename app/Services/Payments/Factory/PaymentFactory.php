<?php

namespace App\Services\Payments\Factory;

use App\Enums\Payments;
use App\Services\Payments\Factory\Paypal\PaypalService;
use App\Services\Payments\Factory\Stripe\StipeService;

class PaymentFactory
{
    public function getInstance(Payments $system): PaymentInterface
    {
        return match ($system) {
            Payments::PAYPAL => app()->make(PaypalService::class),
            Payments::STRIPE => app()->make(StipeService::class),
        };
    }
}
