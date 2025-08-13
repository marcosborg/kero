<?php

namespace App\Http\Requests;

use App\Models\OrderItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_item_create');
    }

    public function rules()
    {
        return [
            'order_id' => [
                'required',
                'integer',
            ],
            'vendor_id' => [
                'required',
                'integer',
            ],
            'name_snapshot' => [
                'string',
                'required',
            ],
            'sku_snapshot' => [
                'string',
                'nullable',
            ],
            'qty' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'subtotal_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tax_rate' => [
                'numeric',
            ],
            'commission_rate' => [
                'numeric',
            ],
            'commission_cents' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
