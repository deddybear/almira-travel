<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatorSendQuestion extends FormRequest
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
            'email' => 'required|email',
            'name'  => 'required|string|max:30',
            'wa'    => 'required|numeric|digits_between:12,15',
            'msg'   => 'required|max:225',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Mohon di isi Email anda',
            'email.email'    => 'Mohon Email anda di isi dengan benar',
            'name.required'  => 'Mohon di isi Nama anda',
            'name.string'    => 'Nama anda mohon di isi dengan benar',
            'name.size'      => 'Batas Nama adalah 30 karakter',
            'wa.required'    => 'Mohon di isi nomer Whatsapp anda',
            'wa.numeric'     => 'Mohon isi nomer Whatsapp dengan benar',
            'wa.size'        => 'Nomer Whatsapp sampai 15 karakter',
            'msg.required'   => 'Mohon di isi Pesan anda untuk kita',
            'msg.size'       => 'Batas Pesan yang dikirim sampai 225 Karakter',
            'g-recaptcha-response.required' => 'Chapta mohon untuk di centang',
            'g-recaptcha-response.captcha' => 'Mohon chapta untuk di centang',
        ];
    }

    public function response(array $errors)
    {
        return response()->json(['message' => $errors]);
    }
}
