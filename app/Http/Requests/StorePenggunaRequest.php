<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenggunaRequest extends FormRequest
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
            "name"=> "required|string|max:100",
            "email"=> "required|email|unique:penggunas",
            "password"=> "required|min:6|confirmed",
            "phone"=> "nullable|digits_between:10,13",

        ];
    }
    public function messages(): array{
        return [
            "name.required"=> "Nama tidak boleh kosong",
            "email.required"=> "Email tidak boleh kosong",
            "email.unique"=> "Email sudah ada",
            "password.required"=> "Password tidak boleh kosong",
            "password.min:6"=> "Password tidak boleh kurang dari 6 karakter",
            "password.confirmed"=> "Konfirmasi Password Tidak Cocok",
        ];
    }
}
