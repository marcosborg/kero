@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.orderItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.order-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.id') }}
                        </th>
                        <td>
                            {{ $orderItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.order') }}
                        </th>
                        <td>
                            {{ $orderItem->order->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.vendor') }}
                        </th>
                        <td>
                            {{ $orderItem->vendor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.product') }}
                        </th>
                        <td>
                            {{ $orderItem->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.name_snapshot') }}
                        </th>
                        <td>
                            {{ $orderItem->name_snapshot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.sku_snapshot') }}
                        </th>
                        <td>
                            {{ $orderItem->sku_snapshot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.qty') }}
                        </th>
                        <td>
                            {{ $orderItem->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.price_cents') }}
                        </th>
                        <td>
                            {{ $orderItem->price_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.subtotal_cents') }}
                        </th>
                        <td>
                            {{ $orderItem->subtotal_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.tax_rate') }}
                        </th>
                        <td>
                            {{ $orderItem->tax_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.commission_rate') }}
                        </th>
                        <td>
                            {{ $orderItem->commission_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderItem.fields.commission_cents') }}
                        </th>
                        <td>
                            {{ $orderItem->commission_cents }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.order-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection