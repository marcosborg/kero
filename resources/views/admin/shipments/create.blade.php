@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.shipment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shipments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="order_id">{{ trans('cruds.shipment.fields.order') }}</label>
                <select class="form-control select2 {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order_id" id="order_id" required>
                    @foreach($orders as $id => $entry)
                        <option value="{{ $id }}" {{ old('order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carrier">{{ trans('cruds.shipment.fields.carrier') }}</label>
                <input class="form-control {{ $errors->has('carrier') ? 'is-invalid' : '' }}" type="text" name="carrier" id="carrier" value="{{ old('carrier', '') }}">
                @if($errors->has('carrier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('carrier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.carrier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tracking_code">{{ trans('cruds.shipment.fields.tracking_code') }}</label>
                <input class="form-control {{ $errors->has('tracking_code') ? 'is-invalid' : '' }}" type="text" name="tracking_code" id="tracking_code" value="{{ old('tracking_code', '') }}">
                @if($errors->has('tracking_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tracking_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.tracking_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.shipment.fields.status') }}</label>
                @foreach(App\Models\Shipment::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', 'pending') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cost_cents">{{ trans('cruds.shipment.fields.cost_cents') }}</label>
                <input class="form-control {{ $errors->has('cost_cents') ? 'is-invalid' : '' }}" type="number" name="cost_cents" id="cost_cents" value="{{ old('cost_cents', '') }}" step="1">
                @if($errors->has('cost_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cost_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.cost_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="label_url">{{ trans('cruds.shipment.fields.label_url') }}</label>
                <input class="form-control {{ $errors->has('label_url') ? 'is-invalid' : '' }}" type="text" name="label_url" id="label_url" value="{{ old('label_url', '') }}">
                @if($errors->has('label_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('label_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.label_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payload">{{ trans('cruds.shipment.fields.payload') }}</label>
                <textarea class="form-control {{ $errors->has('payload') ? 'is-invalid' : '' }}" name="payload" id="payload">{{ old('payload') }}</textarea>
                @if($errors->has('payload'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payload') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shipment.fields.payload_helper') }}</span>
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