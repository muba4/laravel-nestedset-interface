<?php

namespace App\Http\Requests\Admin\Rubric;

use Illuminate\Foundation\Http\FormRequest;

class StorePrimarySiblingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'alias' => 'required|string|max:50|alpha_dash:ascii',
            'is_used' => ['boolean', 'nullable'],
            'icon' => 'nullable|string|max:150',
            'link' => 'nullable|url|max:150',
        ];
    }
}
