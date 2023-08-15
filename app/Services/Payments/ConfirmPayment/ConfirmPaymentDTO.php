<?php

namespace App\Services\Payments\ConfirmPayment;

use App\Enums\Payments;

class ConfirmPaymentDTO
{

    protected bool $paymentSuccess;
    protected string $payerId;
    protected string $email;
    protected string $paymentId;

    public function __construct(
        protected Payments $payments,
        protected string $orderId
    ) {
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @param string $paymentId
     */
    public function setPaymentId(string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPayerId(): string
    {
        return $this->payerId;
    }

    /**
     * @param string $payerId
     */
    public function setPayerId(string $payerId): void
    {
        $this->payerId = $payerId;
    }

    /**
     * @return bool
     */
    public function isPaymentSuccess(): bool
    {
        return $this->paymentSuccess;
    }

    /**
     * @param bool $paymentSuccess
     */
    public function setPaymentSuccess(bool $paymentSuccess): void
    {
        $this->paymentSuccess = $paymentSuccess;
    }

    /**
     * @return Payments
     */
    public function getPayments(): Payments
    {
        return $this->payments;
    }

}
