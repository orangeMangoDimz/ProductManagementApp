<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     protected $stopOnFirstFailure = true;

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
            'cover' => ['required', 'mimes:png,jpg,jpeg', 'max:10000'],
            'title' => ['required', 'string', 'max:500'],
            'product_category_id' => ['required', 'numeric', 'exists:product_categories,id'],
            'description' => ['required', 'string', 'max:10000'],
            'stock' => ['required', 'numeric'],
            'price' => ['required', 'numeric']
        ];
    }
}
