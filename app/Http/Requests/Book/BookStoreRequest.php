<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:1',
                'max:100',
                'unique:books,name'
            ],
            'year' => ['required', 'date'],
            'lang' => [
                'required',
                'string',
                Rule::in(['en', 'ua', 'pl', 'de'])
            ],
            'pages' => ['required', 'integer', 'min:10', 'max:55000'],
        ];
    }
}
