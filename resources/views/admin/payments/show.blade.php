@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.payment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.id') }}
                        </th>
                        <td>
                            {{ $payment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.order') }}
                        </th>
                        <td>
                            {{ $payment->order->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.provider') }}
                        </th>
                        <td>
                            {{ App\Models\Payment::PROVIDER_RADIO[$payment->provider] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.provider_ref') }}
                        </th>
                        <td>
                            {{ $payment->provider_ref }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.amount_cents') }}
                        </th>
                        <td>
                            {{ $payment->amount_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Payment::STATUS_RADIO[$payment->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.payload') }}
                        </th>
                        <td>
                            {{ $payment->payload }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection