<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

     protected $stopOnFirstFailure = true;
    public function rules(): array
    {
        return [
            "username" => ["required", "string", "min:1", "max:20"],
            "email" => ["required", "string", "email"],
            "password" => ["required", Rules\Password::default(), "confirmed"]
        ];
    }
}
