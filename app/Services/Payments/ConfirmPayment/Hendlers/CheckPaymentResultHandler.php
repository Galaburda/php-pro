<?php

namespace App\Services\Payments\ConfirmPayment\Hendlers;

use App\Enums\Payments;
use App\Services\Payments\ConfirmPayment\ConfirmPaymentDTO;
use App\Services\Payments\ConfirmPayment\ConfirmPaymentInterface;
use App\Services\Payments\Factory\DTO\PaypalValidateDTO;
use App\Services\Payments\Factory\PaymentFactory;
use Closure;

class CheckPaymentResultHandler implements ConfirmPaymentInterface
{
    public function __construct(
        protected PaymentFactory $paymentFactory,
    ) {
    }

    public function handle(
        ConfirmPaymentDTO $confirmPaymentDTO,
        Closure $next
    ): ConfirmPaymentDTO
    {
        $paymentService = $this->paymentFactory->getInstance(
            $confirmPaymentDTO->getPayments()
        );

        $validatedData = $paymentService->validatePayment(
            $confirmPaymentDTO->getOrderId()
        );

        /** @var  $validatedData PaypalValidateDTO */
        $confirmPaymentDTO->setPayerId($validatedData->getUserId());
        $confirmPaymentDTO->setEmail($validatedData->getEmail());
        $confirmPaymentDTO->setPaymentId($validatedData->getPaymentId());

        //$confirmPaymentDTO->setPaymentSuccess();

        return $next($confirmPaymentDTO);
    }
}
