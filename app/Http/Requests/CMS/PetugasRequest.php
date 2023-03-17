<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class PetugasRequest extends FormRequest
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
        $namaRules = ['required', 'string', 'max:25'];
        $usernameRules = ['required', 'string', 'max:25'];
        $userPasswordRules = ['required', 'string', 'max:25'];
        $passwordRules = ['required'];
        $levelRules = ['required', 'string'];
        $imageRules = ['required'];

        if (request()->isMethod('PATCH')) {
            $namaRules[0] = ['nullable'];
            $usernameRules[0] = ['nullable'];
            $userPasswordRules[0] = ['nullable'];
            $passwordRules[0] = ['nullable'];
            $levelRules[0] = ['nullable'];
            $imageRules[0] = ['nullable'];
        }

        return [
            'nama_petugas' => $namaRules,
            'username' => $usernameRules,
            'user_password' => $userPasswordRules,
            'password' => $passwordRules,
            'id_level' => $levelRules,
            'image' => $imageRules
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'password' => Hash::make($this->user_password)
        ]);
    }
}
