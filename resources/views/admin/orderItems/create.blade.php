@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.orderItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.order-items.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="order_id">{{ trans('cruds.orderItem.fields.order') }}</label>
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
                <span class="help-block">{{ trans('cruds.orderItem.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vendor_id">{{ trans('cruds.orderItem.fields.vendor') }}</label>
                <select class="form-control select2 {{ $errors->has('vendor') ? 'is-invalid' : '' }}" name="vendor_id" id="vendor_id" required>
                    @foreach($vendors as $id => $entry)
                        <option value="{{ $id }}" {{ old('vendor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vendor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vendor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.vendor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.orderItem.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_snapshot">{{ trans('cruds.orderItem.fields.name_snapshot') }}</label>
                <input class="form-control {{ $errors->has('name_snapshot') ? 'is-invalid' : '' }}" type="text" name="name_snapshot" id="name_snapshot" value="{{ old('name_snapshot', '') }}" required>
                @if($errors->has('name_snapshot'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_snapshot') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.name_snapshot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sku_snapshot">{{ trans('cruds.orderItem.fields.sku_snapshot') }}</label>
                <input class="form-control {{ $errors->has('sku_snapshot') ? 'is-invalid' : '' }}" type="text" name="sku_snapshot" id="sku_snapshot" value="{{ old('sku_snapshot', '') }}">
                @if($errors->has('sku_snapshot'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sku_snapshot') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.sku_snapshot_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qty">{{ trans('cruds.orderItem.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', '') }}" step="1" required>
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price_cents">{{ trans('cruds.orderItem.fields.price_cents') }}</label>
                <input class="form-control {{ $errors->has('price_cents') ? 'is-invalid' : '' }}" type="number" name="price_cents" id="price_cents" value="{{ old('price_cents', '') }}" step="1" required>
                @if($errors->has('price_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.price_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subtotal_cents">{{ trans('cruds.orderItem.fields.subtotal_cents') }}</label>
                <input class="form-control {{ $errors->has('subtotal_cents') ? 'is-invalid' : '' }}" type="number" name="subtotal_cents" id="subtotal_cents" value="{{ old('subtotal_cents', '') }}" step="1" required>
                @if($errors->has('subtotal_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subtotal_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.subtotal_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax_rate">{{ trans('cruds.orderItem.fields.tax_rate') }}</label>
                <input class="form-control {{ $errors->has('tax_rate') ? 'is-invalid' : '' }}" type="number" name="tax_rate" id="tax_rate" value="{{ old('tax_rate', '0.00') }}" step="0.01">
                @if($errors->has('tax_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.tax_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commission_rate">{{ trans('cruds.orderItem.fields.commission_rate') }}</label>
                <input class="form-control {{ $errors->has('commission_rate') ? 'is-invalid' : '' }}" type="number" name="commission_rate" id="commission_rate" value="{{ old('commission_rate', '0.00') }}" step="0.01">
                @if($errors->has('commission_rate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commission_rate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.commission_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commission_cents">{{ trans('cruds.orderItem.fields.commission_cents') }}</label>
                <input class="form-control {{ $errors->has('commission_cents') ? 'is-invalid' : '' }}" type="number" name="commission_cents" id="commission_cents" value="{{ old('commission_cents', '0') }}" step="1">
                @if($errors->has('commission_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commission_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.commission_cents_helper') }}</span>
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