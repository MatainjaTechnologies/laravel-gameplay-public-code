<?php

namespace Modules\Reward\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrizeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'points' => 'integer',
            'quantity' => 'integer',
        ];
    }
    
    public function messages()
    {
        return [
            'points.integer' => 'Point must be number',
            'quantity.integer' => 'Quantity must be number',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
