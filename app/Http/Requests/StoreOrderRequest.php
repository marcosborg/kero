<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:orders',
            ],
            'currency' => [
                'string',
                'required',
            ],
            'subtotal_cents' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'discount_cents' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'shipping_cents' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tax_cents' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'notes' => [
                'string',
                'nullable',
            ],
            'payment_status' => [
                'required',
            ],
        ];
    }
}
