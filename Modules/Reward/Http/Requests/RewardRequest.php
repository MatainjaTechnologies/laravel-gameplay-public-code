<?php

namespace Modules\Reward\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RewardRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'coin' => 'required|integer',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title cannot be blank',
            'description.required' => 'Description cannot be blank',
            'type.required' => 'Please choose reward type',
            'coin.required' => 'Coin cannot be blank',
            'coin.integer' => 'Coin must be number',
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
