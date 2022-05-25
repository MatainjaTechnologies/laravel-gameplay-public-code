<?php

namespace Modules\Game\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'description' => 'required',
            'rule' => 'required',
            'category' => 'required',
            'coin' => 'required|integer',
            /*'url' => 'required'
            'version' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image' => 'required',*/
            'game_file' => 'required|file|mimes:zip,rar,7zip',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
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
            // 'image.required' => 'Please choose a game image',
            'game_file.required' => 'Please choose a zip game file',
            //'url.required' => 'Game URL required'
            'cover_image.required' => 'Cover image required',
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
