<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_edit');
    }

    public function rules()
    {
        return [
            'provider_ref' => [
                'string',
                'nullable',
            ],
            'amount_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
