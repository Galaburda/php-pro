<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge(['id' => $this->route('category')]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:50'],
        ];
    }
}
