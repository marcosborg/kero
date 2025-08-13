<?php

namespace App\Http\Requests;

use App\Models\Vendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVendorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vendor_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
                'unique:vendors',
            ],
            'status' => [
                'required',
            ],
            'support_phone' => [
                'string',
                'nullable',
            ],
            'tax' => [
                'string',
                'nullable',
            ],
            'invoice_name' => [
                'string',
                'nullable',
            ],
            'payout_method' => [
                'required',
            ],
        ];
    }
}
