<?php

namespace App\Http\Requests;

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
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required' , 'email', 'string', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:20'],
            'Address1' => ['required', 'string', 'max:255'],
            'Address2' => ['sometimes', 'nullable', 'string', 'max:255'],
            'kin_name' => ['required', 'string', 'max:255'],
            'kin_phone' => ['required', 'string', 'max:20'],
            'kin_email' => ['required', 'string', 'email', 'max:255'],
            'kin_address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
