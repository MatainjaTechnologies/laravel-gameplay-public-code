<?php

namespace Modules\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request. 'name','description','rule','category','coin','version','is_home','image','url'
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'video_file' => 'required|mimes:mp4,mov,ogg,qt|max:50000'
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
            'name.required' => 'Application name required',
            'description.required' => 'Application description required',
            'type.required' => 'Application type required',
            'category.required' => 'Application category required',
            'image.required' => 'Use proper game image',
            'video_file.required' => 'video  file required',

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
