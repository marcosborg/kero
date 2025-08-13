<?php

namespace App\Http\Requests;

use App\Models\SiteSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSiteSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('site_setting_create');
    }

    public function rules()
    {
        return [
            'key' => [
                'string',
                'required',
                'unique:site_settings',
            ],
        ];
    }
}
