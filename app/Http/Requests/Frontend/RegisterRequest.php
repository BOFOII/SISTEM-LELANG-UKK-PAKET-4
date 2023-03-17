<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_lengkap' => ['required', 'string', 'max:25'],
            'username' => ['required', 'string', 'max:25', 'unique:tb_masyarakat,username'],
            'password' => ['required', 'string'],
            'user_password' => ['required', 'string', 'max:25', 'confirmed'],
            'telp' => ['required', 'string', 'max:25'],
            'image' => ['required', 'string']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'password' => Hash::make($this->user_password)
        ]);
    }
}
