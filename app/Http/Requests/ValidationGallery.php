<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationGallery extends FormRequest
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
            'name' => 'required|max:30',
            'desc' => 'required',
            'photo.*' => 'sometimes|mimes:jpg,jpeg,bmp,png|max:3072'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Mohon di isi nama Paket Tour',
            'name.max'       => 'Nama Maksimal 50 Huruf',
            'desc.required'  => 'Deskripsi harus di isi',
            'photo.mimes'    => 'Tipe Extensi Foto harus JPG, JPEG, BMP, PNG',
            'photo.max'      => 'Foto Ukuran Maksimal 3MB',
        ];
    }

    public function response(array $err)
    {
        return response()->json(['message' => $err]);
    }
}
