<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email,spoof,dns|max:255|unique:users',
            'phone' => 'required|alpha_num|min:10|max:12|unique:users',
            'profile' => 'nullable|mimes:jpeg,jpg,png|max:4096',
            'role_id' => 'required|numeric'
        ];
    }
}
