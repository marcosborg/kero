<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'vendor_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'required',
                'unique:products,slug,' . request()->route('product')->id,
            ],
            'price_cents' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'weight' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'dimensions' => [
                'string',
                'nullable',
            ],
            'seo' => [
                'string',
                'nullable',
            ],
            'images' => [
                'array',
            ],
        ];
    }
}
