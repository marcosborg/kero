@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.order.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.id') }}
                        </th>
                        <td>
                            {{ $order->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.code') }}
                        </th>
                        <td>
                            {{ $order->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.user') }}
                        </th>
                        <td>
                            {{ $order->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Order::STATUS_RADIO[$order->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.currency') }}
                        </th>
                        <td>
                            {{ $order->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.subtotal_cents') }}
                        </th>
                        <td>
                            {{ $order->subtotal_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.discount_cents') }}
                        </th>
                        <td>
                            {{ $order->discount_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.shipping_cents') }}
                        </th>
                        <td>
                            {{ $order->shipping_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.tax_cents') }}
                        </th>
                        <td>
                            {{ $order->tax_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.total_cents') }}
                        </th>
                        <td>
                            {{ $order->total_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.billing_address') }}
                        </th>
                        <td>
                            {{ $order->billing_address->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.shipping_address') }}
                        </th>
                        <td>
                            {{ $order->shipping_address->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.notes') }}
                        </th>
                        <td>
                            {{ $order->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.payment_status') }}
                        </th>
                        <td>
                            {{ App\Models\Order::PAYMENT_STATUS_RADIO[$order->payment_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection