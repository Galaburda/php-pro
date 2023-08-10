<?php

namespace App\Http\Requests\Payment;

use App\Enums\Currency;
use App\Enums\Payments;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentMakeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'paymentSystem' => ['required', Rule::enum(Payments::class)],
        ];
    }
}
