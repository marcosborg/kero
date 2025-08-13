<?php

namespace App\Http\Requests;

use App\Models\CommissionRule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCommissionRuleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('commission_rule_edit');
    }

    public function rules()
    {
        return [
            'rate_percent' => [
                'numeric',
                'required',
            ],
            'valid_from' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'valid_to' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
