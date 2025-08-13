<?php

namespace App\Http\Requests;

use App\Models\Shipment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShipmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_create');
    }

    public function rules()
    {
        return [
            'order_id' => [
                'required',
                'integer',
            ],
            'carrier' => [
                'string',
                'nullable',
            ],
            'tracking_code' => [
                'string',
                'nullable',
            ],
            'cost_cents' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'label_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
