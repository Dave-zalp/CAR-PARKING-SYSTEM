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
            'name' => ['required'],
            'email' => ['required' , 'email'],
            'phone' => ['required'],
            'Address1' => ['required'],
            'Address2' => ['required'],
            'kin_name' => ['required'],
            'kin_phone' => ['required'],
            'kin_email' => ['required'],
            'kin_address' => ['required'],
            'password' => ['required']
        ];
    }
}
