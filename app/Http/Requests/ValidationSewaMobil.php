<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationSewaMobil extends FormRequest
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
            'name' => 'required|string|max:50',
            'price' => 'required|'
        ];
    }
    public function messages()
    {
        return [

        ];
    }

    public function response(array $err)
    {
        return response()->json(['message' => $err]);
    }
}
