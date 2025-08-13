@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="order_id">{{ trans('cruds.payment.fields.order') }}</label>
                <select class="form-control select2 {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order_id" id="order_id">
                    @foreach($orders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('order_id') ? old('order_id') : $payment->order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.payment.fields.provider') }}</label>
                @foreach(App\Models\Payment::PROVIDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('provider') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="provider_{{ $key }}" name="provider" value="{{ $key }}" {{ old('provider', $payment->provider) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="provider_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('provider'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provider') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.provider_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provider_ref">{{ trans('cruds.payment.fields.provider_ref') }}</label>
                <input class="form-control {{ $errors->has('provider_ref') ? 'is-invalid' : '' }}" type="text" name="provider_ref" id="provider_ref" value="{{ old('provider_ref', $payment->provider_ref) }}">
                @if($errors->has('provider_ref'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provider_ref') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.provider_ref_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount_cents">{{ trans('cruds.payment.fields.amount_cents') }}</label>
                <input class="form-control {{ $errors->has('amount_cents') ? 'is-invalid' : '' }}" type="number" name="amount_cents" id="amount_cents" value="{{ old('amount_cents', $payment->amount_cents) }}" step="1" required>
                @if($errors->has('amount_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amount_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.payment.fields.status') }}</label>
                @foreach(App\Models\Payment::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $payment->status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payload">{{ trans('cruds.payment.fields.payload') }}</label>
                <textarea class="form-control {{ $errors->has('payload') ? 'is-invalid' : '' }}" name="payload" id="payload">{{ old('payload', $payment->payload) }}</textarea>
                @if($errors->has('payload'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payload') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payload_helper') }}</span>
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