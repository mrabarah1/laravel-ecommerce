<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthAdminRequest extends FormRequest
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
            //fields we need to validate
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ];
    }
}
