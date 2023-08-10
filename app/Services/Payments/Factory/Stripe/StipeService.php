<?php

namespace App\Services\Payments\Factory\Stripe;

use App\Enums\Currency;
use App\Services\Payments\Factory\PaymentInterface;
use App\Services\Payments\Factory\DTO\MakePaymentDTO;
use Stripe\StripeClient;

class StipeService implements PaymentInterface
{
    public function __construct(
        protected StripeClient $stripe
    ) {
    }

    public function createPayment(MakePaymentDTO $paymentDTO): string
    {
        $result = $this->stripe->paymentIntents->create([
            'amount' => $paymentDTO->getAmount() * 100,
            'currency' => $this->getCurrency($paymentDTO->getCurrency()),
        ]);

        return $result->client_secret;
    }

    public function validatePayment(string $paymentId): bool
    {
        $result = $this->stripe->paymentIntents->retrieve($paymentId);

        return $result->status === 'succeeded';
    }

    private function getCurrency(Currency $currency): string
    {
        return match ($currency) {
            Currency::USD => 'usd',
            Currency::EUR => 'eur',
        };
    }
}
