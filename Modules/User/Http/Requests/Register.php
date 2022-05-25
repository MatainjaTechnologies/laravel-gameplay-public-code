<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class register extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'name' => 'required|string',
                'email'=> 'required|email|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    'min:6',             // must be at least 6 characters in length
                    // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                    // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    // 'regex:/[0-9]/',      // must contain at least one digit
                    // 'regex:/[@$!%*#?&]/', // must contain a special character
                ],
                'retypepassword' => 'required|same:password|min:6',
                'checkbox' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function messages()
    {
        return [
            'name' => 'name required',
            'email.required' => 'email required',
            'password.required' => 'password be at least 6 characters',
            'retypepassword.required' => 'Retype password required',
            'checkbox.required' => 'Select  terms and condititons',
        ];
    }
}
