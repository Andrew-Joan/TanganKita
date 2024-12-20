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
            'email' => 'required|email|unique:users',
            'password' => 'required|string|max:255|min:8',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:tomorrow'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Alamat e-mail',
            'password' => 'Kata sandi',
            'name' => 'Nama',
            'date_of_birth' => 'Tanggal lahir'
        ];
    }
}
