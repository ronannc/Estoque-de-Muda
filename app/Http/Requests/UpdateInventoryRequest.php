<?php

namespace App\Http\Requests;

use App\Rules\GreaterThanOrEqualSpecie;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
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
            'date'        => 'required|date',
            'type'        => 'required',
            'destiny'     => 'required',
            'nursery_id'  => 'required',
            'specie_id'   => 'required',
            'quantity'    => [ 'required', 'integer', new GreaterThanOrEqualSpecie( $this->specie_id, $this->type ) ],
            'observation' => 'required',
            'responsible' => 'required',        ];
    }
}
