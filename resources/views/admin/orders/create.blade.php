@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.order.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.status') }}</label>
                @foreach(App\Models\Order::STATUS_RADIO as $key => $label)
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
                <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency">{{ trans('cruds.order.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', 'EUR') }}" required>
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtotal_cents">{{ trans('cruds.order.fields.subtotal_cents') }}</label>
                <input class="form-control {{ $errors->has('subtotal_cents') ? 'is-invalid' : '' }}" type="number" name="subtotal_cents" id="subtotal_cents" value="{{ old('subtotal_cents', '') }}" step="1">
                @if($errors->has('subtotal_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subtotal_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.subtotal_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount_cents">{{ trans('cruds.order.fields.discount_cents') }}</label>
                <input class="form-control {{ $errors->has('discount_cents') ? 'is-invalid' : '' }}" type="number" name="discount_cents" id="discount_cents" value="{{ old('discount_cents', '') }}" step="1">
                @if($errors->has('discount_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.discount_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_cents">{{ trans('cruds.order.fields.shipping_cents') }}</label>
                <input class="form-control {{ $errors->has('shipping_cents') ? 'is-invalid' : '' }}" type="number" name="shipping_cents" id="shipping_cents" value="{{ old('shipping_cents', '') }}" step="1">
                @if($errors->has('shipping_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax_cents">{{ trans('cruds.order.fields.tax_cents') }}</label>
                <input class="form-control {{ $errors->has('tax_cents') ? 'is-invalid' : '' }}" type="number" name="tax_cents" id="tax_cents" value="{{ old('tax_cents', '') }}" step="1">
                @if($errors->has('tax_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.tax_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_cents">{{ trans('cruds.order.fields.total_cents') }}</label>
                <input class="form-control {{ $errors->has('total_cents') ? 'is-invalid' : '' }}" type="number" name="total_cents" id="total_cents" value="{{ old('total_cents', '') }}" step="1" required>
                @if($errors->has('total_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="billing_address_id">{{ trans('cruds.order.fields.billing_address') }}</label>
                <select class="form-control select2 {{ $errors->has('billing_address') ? 'is-invalid' : '' }}" name="billing_address_id" id="billing_address_id">
                    @foreach($billing_addresses as $id => $entry)
                        <option value="{{ $id }}" {{ old('billing_address_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('billing_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('billing_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.billing_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_address_id">{{ trans('cruds.order.fields.shipping_address') }}</label>
                <select class="form-control select2 {{ $errors->has('shipping_address') ? 'is-invalid' : '' }}" name="shipping_address_id" id="shipping_address_id">
                    @foreach($shipping_addresses as $id => $entry)
                        <option value="{{ $id }}" {{ old('shipping_address_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('shipping_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.order.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', '') }}">
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.order.fields.payment_status') }}</label>
                @foreach(App\Models\Order::PAYMENT_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('payment_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="payment_status_{{ $key }}" name="payment_status" value="{{ $key }}" {{ old('payment_status', 'unpaid') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="payment_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.payment_status_helper') }}</span>
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