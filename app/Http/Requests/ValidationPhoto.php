<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationPhoto extends FormRequest
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
            'photo' =>  'sometimes|required',
            'photo.*' => 'required|mimes:jpg,jpeg,png,webp|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'photo.mimes'      => 'Tipe Extensi Foto harus JPG, JPEG, BMP, PNG',
            'photo.max'       => 'Foto Ukuran Maksimal 3MB',
        ];
    }

    public function response(array $err)
    {
        return response()->json(['message' => $err]);
    }
}
