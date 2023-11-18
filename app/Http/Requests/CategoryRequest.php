<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'priority' => 'required|integer|min:0|max:10'
        ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
{
    return [
        'name.required' => 'You must provide a name for the category',
        'name.max' => 'The category name cannot exceed 255 characters',
        'description.required' => 'You must provide a description for the category',
        'description.max' => 'The category description cannot exceed 500 characters',
        'priority.required' => 'You must provide a priority for the category',
        'priority.integer' => 'The category priority must be an integer',
        'priority.min' => 'The category priority must be greater than or equal to 0',
        'priority.max' => 'The category priority must be less than or equal to 10',
    ];
}
}
