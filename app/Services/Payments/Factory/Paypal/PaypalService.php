<?php

namespace App\Services\Payments\Factory\Paypal;

use App\Enums\Currency;
use App\Enums\PaymentsStatus;
use App\Services\Payments\Factory\PaymentInterface;
use App\Services\Payments\Factory\DTO\MakePaymentDTO;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalService implements PaymentInterface
{
    public function __construct(
        protected PayPalClient $provider,
    ) {
    }

    public function createPayment(MakePaymentDTO $paymentDTO): string
    {
        $this->provider->setApiCredentials(config('paypal'));
        $paypalToken = $this->provider->getAccessToken();
        $response = $this->provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $this->getCurrency(
                            $paymentDTO->getCurrency()
                        ),
                        "value" => number_format(
                            $paymentDTO->getAmount(),
                            2,
                            '.'
                        )
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            return $response['id'];
        }

        return '';
    }

    public function validatePayment(string $paymentId)
    {
        $this->provider->setApiCredentials(config('paypal'));
        $paypalToken = $this->provider->getAccessToken();
        $response = $this->provider->capturePaymentOrder($paymentId);

        return $response['status'] === 'COMPLETED';

        //return $response;
        //$response['config']['client_id'];
        // return new PaymentValidateDTO(getStatus($response['getStatus']), $response[order_id], ))
    }

    private function getCurrency(Currency $currency): string
    {
        return match ($currency) {
            Currency::USD => 'USD',
            Currency::EUR => 'EUR',
        };
    }

//    private function getStatus(PaymentsStatus $status): string
//    {
//        return match ($status) {
//            PaymentsStatus::COMPLETED => 'COMPLETED',
//            PaymentsStatus::CREATED => 'CREATED',
//        };
//    }
}
