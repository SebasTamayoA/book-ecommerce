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
            'name.required' => 'Debe colocar un nombre a la categoría',
            'name.max' => 'El nombre de la categoría no puede superar los 255 caracteres',
            'description.required' => 'Debe colocar una descripción a la categoría',
            'description.max' => 'La descripción de la categoría no puede superar los 500 caracteres',
            'priority.required' => 'Debe colocar una prioridad a la categoría',
            'priority.integer' => 'La prioridad de la categoría debe ser un número entero',
            'priority.min' => 'La prioridad de la categoría debe ser mayor o igual a 0',
            'priority.max' => 'La prioridad de la categoría debe ser menor o igual a 10'
        ];
    }
}
