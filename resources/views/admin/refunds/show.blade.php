@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.refund.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.refunds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.refund.fields.id') }}
                        </th>
                        <td>
                            {{ $refund->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refund.fields.order') }}
                        </th>
                        <td>
                            {{ $refund->order->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refund.fields.amount_cents') }}
                        </th>
                        <td>
                            {{ $refund->amount_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refund.fields.reason') }}
                        </th>
                        <td>
                            {{ $refund->reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refund.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Refund::STATUS_RADIO[$refund->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refund.fields.payload') }}
                        </th>
                        <td>
                            {{ $refund->payload }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.refunds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection