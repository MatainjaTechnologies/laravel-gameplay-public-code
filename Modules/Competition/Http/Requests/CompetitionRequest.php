<?php

namespace Modules\Competition\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetitionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'competition_type' => 'required',
            'compgame_name' => 'required|string|max:50',
            'first_prizecoin' => 'required|integer|max:50',
            'second_prizecoin' => 'required|integer|max:50',
            'third_prizecoin' => 'required|integer|max:50',
            'first_prizeicon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'second_prizeicon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'third_prizeicon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
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
            'competition_type.required' => 'Competition type name required',
            'compgame_name.required' => 'Competition name required',
            'first_prizecoin' => 'First Prizecoin required',
            'second_prizecoin' => 'Second Prizecoin required',
            'third_prizecoin' => 'Third Prizecoin required',
            'first_prizeicon_image.required' => 'first prize Use proper game image',
            'second_prizeicon_image.required' => 'second prize Use proper game image',
            'third_prizeicon_image.required' => 'third prize Use proper game image',
            'image.required' => 'Banner image required',
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
