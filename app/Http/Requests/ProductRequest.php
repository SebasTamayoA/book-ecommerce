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
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'name.required' => 'You must provide a name for the product',
            'name.max' => 'The product name cannot exceed 255 characters',
            'description.required' => 'You must provide a description for the product',
            'description.max' => 'The product description cannot exceed 500 characters',
            'image.nullable' => 'You must provide an image for the product',
            'image.max' => 'The product image cannot exceed 255 characters',
            'author.required' => 'You must provide an author for the product',
            'author.max' => 'The product author cannot exceed 255 characters',
            'editorial.required' => 'You must provide an editorial for the product',
            'editorial.max' => 'The product editorial cannot exceed 255 characters',
            'year.required' => 'You must provide a year for the product',
            'year.integer' => 'The product year must be an integer',
            'language.required' => 'You must provide a language for the product',
            'language.max' => 'The product language cannot exceed 50 characters',
            'stock.required' => 'You must provide a stock for the product',
            'stock.integer' => 'The product stock must be an integer',
            'stock.min' => 'The product stock cannot be less than 0',
            'stock.max' => 'The product stock cannot be greater than 100',
            'price.required' => 'You must provide a price for the product',
            'price.numeric' => 'The product price must be a number',
            'price.min' => 'The product price cannot be less than 0',
            'price.max' => 'The product price cannot be greater than 1000',
            'category_id.required' => 'You must provide a category for the product',
        ];
    }
}
