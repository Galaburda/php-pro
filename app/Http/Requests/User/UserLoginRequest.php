<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //TODO:для емейлу рекомендую додавати додаткові умови.
            // якщо користуватися стандартними які є в валідаторі
            // https://laravel.com/docs/10.x/validation#rule-email то це email:rfc,dns
            'email' => ['required', 'string', 'email', 'max:255'],
            //TODO:для пароля рекомендую додати більш складніші умови
            // Password::min(8)
            // ->mixedCase() # Потрібна хоча б одна велика і одна мала літери
            // ->numbers() # Потрібна хоча б одна цифра
            // ->symbols() # Потрібний хоча б один символ
            // це як приклад...
            'password' => ['required', 'min:6'],
        ];
    }
}
