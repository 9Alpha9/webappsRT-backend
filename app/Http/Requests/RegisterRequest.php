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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nik' => 'string|required|digits:16',
            'full_name' => 'string|required',
            'address' => 'string|required',
            'handphone' => 'string|required|digits_between:10,14',
            'password' => 'string|required',
        ];
    }
}
