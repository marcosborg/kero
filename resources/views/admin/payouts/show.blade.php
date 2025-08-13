@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.payout.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.id') }}
                        </th>
                        <td>
                            {{ $payout->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.vendor') }}
                        </th>
                        <td>
                            {{ $payout->vendor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.period_start') }}
                        </th>
                        <td>
                            {{ $payout->period_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.period_end') }}
                        </th>
                        <td>
                            {{ $payout->period_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.gross_cents') }}
                        </th>
                        <td>
                            {{ $payout->gross_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.commissions_cents') }}
                        </th>
                        <td>
                            {{ $payout->commissions_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.refunds_cents') }}
                        </th>
                        <td>
                            {{ $payout->refunds_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.net_cents') }}
                        </th>
                        <td>
                            {{ $payout->net_cents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Payout::STATUS_RADIO[$payout->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payout.fields.payload') }}
                        </th>
                        <td>
                            {{ $payout->payload }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection