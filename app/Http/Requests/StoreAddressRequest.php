<?php

namespace App\Http\Requests;

use App\Models\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_create');
    }

    public function rules()
    {
        return [
            'addressable_type' => [
                'string',
                'required',
            ],
            'addressable' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'line_1' => [
                'string',
                'required',
            ],
            'line_2' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'required',
            ],
            'postcode' => [
                'string',
                'required',
            ],
            'country_id' => [
                'required',
                'integer',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
