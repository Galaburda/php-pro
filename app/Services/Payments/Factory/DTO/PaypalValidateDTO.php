<?php

namespace App\Services\Payments\Factory\DTO;


class PaypalValidateDTO
{
    protected string $status;
    protected string $orderId;
    protected string $userId;
    protected string $email;
    protected string $name;
    protected string $paymentId;
    protected string $countryCode;

    public function __construct(array $data)
    {
        $this->status = $data['status'];
        $this->orderId = $data['id'];
        $this->userId = $data['payer']['payer_id'];
        $this->email = $data['payer']['email_address'];
        $this->name = $data['payer']['name']['given_name'];
        $this->countryCode = $data['payer']['address']['country_code'];
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

}
