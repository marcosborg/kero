<?php

namespace App\Http\Requests;

use App\Models\Payout;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePayoutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payout_edit');
    }

    public function rules()
    {
        return [
            'vendor_id' => [
                'required',
                'integer',
            ],
            'period_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'period_end' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'gross_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'commissions_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'refunds_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'net_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
