<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookUpdateRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        $this->merge(['id' => $this->route('book')]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:books,id'],
            'name' => ['required', 'string', 'min:1', 'max:100', 'unique:books,name'],
            'year' => ['required', 'date'],
            'lang' => ['required', 'string', Rule::in(['en', 'ua', 'pl', 'de'])],
            'pages' => ['required', 'integer', 'min:10', 'max:55000'],
        ];
    }
}
