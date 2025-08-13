@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.commissionRule.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.commission-rules.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="vendor_id">{{ trans('cruds.commissionRule.fields.vendor') }}</label>
                <select class="form-control select2 {{ $errors->has('vendor') ? 'is-invalid' : '' }}" name="vendor_id" id="vendor_id">
                    @foreach($vendors as $id => $entry)
                        <option value="{{ $id }}" {{ old('vendor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vendor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vendor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionRule.fields.vendor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rate_percent">{{ trans('cruds.commissionRule.fields.rate_percent') }}</label>
                <input class="form-control {{ $errors->has('rate_percent') ? 'is-invalid' : '' }}" type="number" name="rate_percent" id="rate_percent" value="{{ old('rate_percent', '') }}" step="0.01" required>
                @if($errors->has('rate_percent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rate_percent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionRule.fields.rate_percent_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="valid_from">{{ trans('cruds.commissionRule.fields.valid_from') }}</label>
                <input class="form-control date {{ $errors->has('valid_from') ? 'is-invalid' : '' }}" type="text" name="valid_from" id="valid_from" value="{{ old('valid_from') }}" required>
                @if($errors->has('valid_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('valid_from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionRule.fields.valid_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valid_to">{{ trans('cruds.commissionRule.fields.valid_to') }}</label>
                <input class="form-control date {{ $errors->has('valid_to') ? 'is-invalid' : '' }}" type="text" name="valid_to" id="valid_to" value="{{ old('valid_to') }}">
                @if($errors->has('valid_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('valid_to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissionRule.fields.valid_to_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection