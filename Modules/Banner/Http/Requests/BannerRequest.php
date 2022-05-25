<?php

namespace Modules\Banner\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120|dimensions:min_width=330,min_height=150',
            'game' => 'required'
        ];
    }

    public function messages(Type $var = null)
    {
        return [
            'banner_image.required' => 'Choose proper image',
            'banner_image.mimes' => 'Not a image file',
            'banner_image.dimensions' => 'Image minimum width 330px and minimum height 150px required',
            'game.required' => 'Choose game'
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

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'width' => '330px',
            'height' => '150px'
        ];
    }
}
