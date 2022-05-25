<?php

namespace Modules\Competition\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class edit extends FormRequest
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
            
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return [
            'competition_type.required' => 'Competition type name required',
            'compgame_name.required' => 'Competition name required',
            'first_prizecoin' => 'First Prizecoin required',
            'second_prizecoin' => 'Second Prizecoin required',
            'third_prizecoin' => 'Third Prizecoin required',
            
        ];
    }
    
}
