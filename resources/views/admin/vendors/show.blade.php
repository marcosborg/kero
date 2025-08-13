@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vendor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.id') }}
                        </th>
                        <td>
                            {{ $vendor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.user') }}
                        </th>
                        <td>
                            {{ $vendor->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.name') }}
                        </th>
                        <td>
                            {{ $vendor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.slug') }}
                        </th>
                        <td>
                            {{ $vendor->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.description') }}
                        </th>
                        <td>
                            {!! $vendor->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Vendor::STATUS_RADIO[$vendor->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.support_email') }}
                        </th>
                        <td>
                            {{ $vendor->support_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.support_phone') }}
                        </th>
                        <td>
                            {{ $vendor->support_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.tax') }}
                        </th>
                        <td>
                            {{ $vendor->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.invoice_name') }}
                        </th>
                        <td>
                            {{ $vendor->invoice_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.payout_method') }}
                        </th>
                        <td>
                            {{ App\Models\Vendor::PAYOUT_METHOD_RADIO[$vendor->payout_method] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.payout_data') }}
                        </th>
                        <td>
                            {{ $vendor->payout_data }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection