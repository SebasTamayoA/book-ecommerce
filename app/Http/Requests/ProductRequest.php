<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'year' => 'required|integer',
            'language' => 'required|string|max:50',
            'stock' => 'required|integer|min:0|max:100',
            'price' => 'required|numeric|min:0|max:1000',
            'category_id' => 'required|integer'
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
            'name.required' => 'Debe colocar un nombre al producto',
            'name.max' => 'El nombre del producto no puede superar los 255 caracteres',
            'description.required' => 'Debe colocar una descripción al producto',
            'description.max' => 'La descripción del producto no puede superar los 500 caracteres',
            'image.required' => 'Debe colocar una imagen al producto',
            'image.max' => 'La imagen del producto no puede superar los 255 caracteres',
            'author.required' => 'Debe colocar un autor al producto',
            'author.max' => 'El autor del producto no puede superar los 255 caracteres',
            'editorial.required' => 'Debe colocar una editorial al producto',
            'editorial.max' => 'La editorial del producto no puede superar los 255 caracteres',
            'year.required' => 'Debe colocar un año al producto',
            'year.integer' => 'El año del producto debe ser un número entero',
            'language.required' => 'Debe colocar un idioma al producto',
            'language.max' => 'El idioma del producto no puede superar los 50 caracteres',
            'stock.required' => 'Debe colocar un stock al producto',
            'stock.integer' => 'El stock del producto debe ser un número entero',
            'stock.min' => 'El stock del producto no puede ser menor a 0',
            'stock.max' => 'El stock del producto no puede ser mayor a 100',
            'price.required' => 'Debe colocar un precio al producto',
            'price.numeric' => 'El precio del producto debe ser un número',
            'price.min' => 'El precio del producto no puede ser menor a 0',
            'price.max' => 'El precio del producto no puede ser mayor a 1000',
            'category_id.required' => 'Debe colocar una categoría al producto'
        ];
    }
}
