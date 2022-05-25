<?php

namespace Modules\Game\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequestImagewo extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'rule' => 'required',
            'category' => 'required',
            'coin' => 'required|integer',
            //'version' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            //'url' => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Game name required',
            'description.required' => 'Game description required',
            'rule.required' => 'Game rule required',
            'category.required' => 'Game category required',
            'coin.required' => 'Coin will 0 if NA',
            'coin.integer' => 'Coin have to be number',
            //'version.required' => 'Game version required',
            // 'image.required' => 'Use proper game image',
            //'url.required' => 'Game URL required'
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
