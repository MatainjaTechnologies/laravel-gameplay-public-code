<?php

namespace Modules\Domain\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo' => 'required',
            'domain_name' => 'required',
            'source_path' => 'required',
            'destination_path' => 'required',
            'daily_subs_url'=> 'required',
            'weekly_subs_url'=> 'required',
            'monthly_subs_url'=> 'required',
            'yearly_subs_url'=> 'required',
            'renew_subs_url'=> 'required',
            'subscribe_notify_url' => 'required',
            'unsubscribe_notify_url' => 'required',                    
        ];
    }

    public function messages()
    {
        return [
            'logo.required' => 'Logo required',
            'domian_name.required' => 'Domain name required',
            'source_path.required' => 'Source path required',
            'destination_path.required' => 'Destination path required',
            'daily_subs_url.required' => 'Daily subscription URL required',
            'weekly_subs_url.required' => 'Weekly subscription URL required',
            'monthly_subs_url.required' => 'Monthly subscription URL required',
            'yearly_subs_url.required' => ' Yearly subscription URL required',
            'renew_subs_url.required' => 'Renew subscription URL required',
            'subscribe_notify_url.required' => 'Subscribe notify URL required',
            'unsubscribe_notify_url.required' => 'Unsubscribe notify URL required',                 
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
