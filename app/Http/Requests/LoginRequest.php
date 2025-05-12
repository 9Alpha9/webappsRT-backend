<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'nik' => 'required|integer|digits:16',
            'password' => 'required'
        ];
    }
    public function messages():array{

            return [
                'required' => ':attribute tidak boleh kosong!',
                'required' => ':attribute tidak boleh kosong!',
                'digits' => ':attribute harus :digits digit!',
                // 'digits_between' => ':attribute harus antara :min - :max',
            ];

    }

    public function attributes(): array
    {
        return [
            'nik' => 'NIK',
            'password' => 'Password',
        ];
    }
}