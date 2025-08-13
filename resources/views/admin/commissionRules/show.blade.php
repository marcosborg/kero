@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.commissionRule.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commission-rules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionRule.fields.id') }}
                        </th>
                        <td>
                            {{ $commissionRule->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionRule.fields.vendor') }}
                        </th>
                        <td>
                            {{ $commissionRule->vendor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionRule.fields.rate_percent') }}
                        </th>
                        <td>
                            {{ $commissionRule->rate_percent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionRule.fields.valid_from') }}
                        </th>
                        <td>
                            {{ $commissionRule->valid_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissionRule.fields.valid_to') }}
                        </th>
                        <td>
                            {{ $commissionRule->valid_to }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commission-rules.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection