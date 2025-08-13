@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shipment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shipment.fields.id') }}
                        </th>
                        <td>
                            {{ $shipment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipment.fields.order') }}
                        </th>
                        <td>
                            {{ $shipment->order->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipment.fields.carrier') }}
                        </th>
                        <td>
                            {{ $shipment->carrier }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipment.fields.tracking_code') }}
                        </th>
                        <td>
                            {{ $shipment->tracking_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipment.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Shipment::STATUS_RADIO[$shipment->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipment.fields.cost_cents') }}
                        </th>
                        <td>
                            {{ $shipment->cost_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipment.fields.label_url') }}
                        </th>
                        <td>
                            {{ $shipment->label_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shipment.fields.payload') }}
                        </th>
                        <td>
                            {{ $shipment->payload }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shipments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection