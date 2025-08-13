<?php

namespace App\Http\Requests;

use App\Models\Refund;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRefundRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('refund_edit');
    }

    public function rules()
    {
        return [
            'order_id' => [
                'required',
                'integer',
            ],
            'amount_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'reason' => [
                'string',
                'nullable',
            ],
        ];
    }
}
