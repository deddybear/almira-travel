<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationSearchTravelRegular extends FormRequest
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
            'name'      => 'nullable|string',
            'price'     => 'nullable|string',
            'trip'      => 'nullable|string',
            'transport' => 'nullable|string',
            'door'      => 'nullable|string',
            'limit'     => 'sometimes|numeric|max:20',
            'offset'    => 'sometimes|numeric'
        ];
    }

    public function response(array $err)
    {
        return response()->json(['message' => $err]);
    }
}
