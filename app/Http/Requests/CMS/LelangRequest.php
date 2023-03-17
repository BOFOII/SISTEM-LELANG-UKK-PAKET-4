<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class LelangRequest extends FormRequest
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
        $tglRules = ['required'];
        $barangRules = ['required'];

        if(request()->isMethod('PATCH')) {
            $tglRules[0] = 'nullable';
            $barangRules[0] = 'nullable';
        }

        return [
            'tgl_lelang' => $tglRules,
            'id_barang' => $barangRules
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tgl_lelang' => date('Y-m-d', strtotime($this->tgl_lelang))
        ]);
    }
}
