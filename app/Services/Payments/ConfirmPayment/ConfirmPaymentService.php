<?php

namespace App\Services\Payments\ConfirmPayment;

use App\Enums\Payments;
use App\Services\Payments\ConfirmPayment\Hendlers\CheckPaymentResultHandler;
use App\Services\Payments\ConfirmPayment\Hendlers\SavePaymentResultHandler;
use Illuminate\Pipeline\Pipeline;

class ConfirmPaymentService
{
    protected const HANDLERS
        = [
            CheckPaymentResultHandler::class,
            SavePaymentResultHandler::class,
        ];

    public function __construct(
        protected Pipeline $pipeline,
    ) {
    }

    public function handle(
        Payments $payments,
        string $orderId
    ): ConfirmPaymentDTO {
        $dto = new ConfirmPaymentDTO($payments, $orderId);

        $result = $this->pipeline
            ->send($dto)
            ->through(self::HANDLERS)
            ->then(fn(ConfirmPaymentDTO $dto) => $dto);

        return $result;
    }
}
