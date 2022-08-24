<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNurseryRequest extends FormRequest
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
            'name'         => 'required|max:120',
            'address'      => 'required|max:120',
            'neighborhood' => 'required|max:120',
            'number'       => 'required|max:120',
            'city_id'      => 'required|max:120',
        ];
    }
}
