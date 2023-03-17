<?php

namespace App\Http\Requests\CMS;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
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
        $namaBarangRules = ['required', 'string', 'max:25'];
        $tglBarangRules = ['required'];
        $hargaBarangRules = ['required', 'string', 'max:20'];
        $deskRules = ['required', 'string', 'max:100'];
        $imagesRules = ['required'];

        if(request()->isMethod('PATCH')) {
            $namaBarangRules[0] = 'nullable';
            $tglBarangRules[0] = 'nullable';
            $hargaBarangRules[0] = 'nullable';
            $deskRules[0] = 'nullable';
            $imagesRules[0] = 'nullable';
        }

        return [
            'nama_barang' => $namaBarangRules,
            'tgl' => $tglBarangRules,
            'harga_awal' => $hargaBarangRules,
            'deskripsi_barang' => $deskRules,
            'images' => $imagesRules
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tgl' => date('Y-m-d', strtotime($this->tgl))
        ]);
    }
}
