<?php

namespace App\Http\Requests;
// use Illuminate\Validation\Validator;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\CustomExceptionHandler;
use App\Http\Resources\RegisterUser;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|alpha_num|min:10|max:12|unique:users',
            'profile' => 'nullable|mimes:jpeg,jpg,png|max:4096',
            'role_id' => 'required|numeric'
        ];

    }

    public function messages()
    {
        return [
            'first_name.requird' => 'First name is required. Cannot be empty',
            'first_name.string' => 'The field must be a string',
            'first_name.max' => 'The maximum supported and allow length is 255',
        ];
    }
    
}
