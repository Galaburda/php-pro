<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
            'name' => ['sometimes', 'string', 'max:50'],
            'author' => ['sometimes', 'string', 'max:100'],
            'year' => ['sometimes', 'date'],
            'countPages' => ['sometimes', 'integer', 'min:1'],
        ];
    }
}
