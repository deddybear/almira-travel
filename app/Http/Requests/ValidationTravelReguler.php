<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationTravelReguler extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'price' => 'required|numeric',
            'category' => 'required',
            'lokasi' => 'required',
            'trip' => 'required',
            'trans' => 'required',
            'door' => 'required',
            'photo' =>  'sometimes|required',
            'photo.*' => 'required|mimes:jpg,jpeg,png,webp|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Mohon di isi nama Paket Tour',
            'name.max'       => 'Nama Maksimal 50 Huruf',
            'price.required' => 'Masukkan Harga',
            'price.numeric'  => 'Format harga salah',
            'plan.required'  => 'Trip Plan Harus di isi',
            'detail.required' => 'Detail Harus di isi',
            'offer.required'  => 'Best Offer Harus di isi',
            'prepare.required' => 'Prepare Harus di isi',
            'photo.mimes'      => 'Tipe Extensi Foto harus JPG, JPEG, BMP, PNG',
            'photo.max'       => 'Foto Ukuran Maksimal 1MB',
        ];
    }

    public function response(array $err)
    {
        return response()->json(['message' => $err]);
    }
}
