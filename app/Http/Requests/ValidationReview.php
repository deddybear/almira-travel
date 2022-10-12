<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationReview extends FormRequest
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
            'rating' => 'required|numeric|between:1,5',
            'msg'    => 'required|string|max:255',
            'name'   => 'required|string|max:50',
            'email'  => 'required|email|unique:review,email',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'rating.required' => 'Mohon untuk di-isi rating',
            'rating.numeric'  => 'Format Rating salah, mohon untuk tidak mengedit value',
            'rating.between'  => 'Rentang rating 1 - 5',
            'msg.required'    => 'Mohon untuk memberikan pesan review',
            'msg.string'      => 'Format Pesan review salah',
            'msg.max'         => 'Batas pesan sampai 255 karakter',
            'name.required'   => 'Mohon untuk di isi nama anda',
            'name.string'     => 'Format Nama Salah',
            'name.max'        => 'Nama Maksimal 50 Karakter',
            'email.required'  => 'Mohon untuk di-isi Email anda',
            'email.email'     => 'Format email salah',
            'email.unique'    => 'Email ini Telah didaftarkan',
            'g-recaptcha-response.required' => 'Chapta mohon untuk di centang',
            'g-recaptcha-response.captcha' => 'Mohon chapta untuk di centang',
        ];
    }

    public function response(array $errors)
    {
        return response()->json(['message' => $errors]);
    }
}
