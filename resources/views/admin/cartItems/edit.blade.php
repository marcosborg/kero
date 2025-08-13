@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cartItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cart-items.update", [$cartItem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="cart_id">{{ trans('cruds.cartItem.fields.cart') }}</label>
                <select class="form-control select2 {{ $errors->has('cart') ? 'is-invalid' : '' }}" name="cart_id" id="cart_id" required>
                    @foreach($carts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cart_id') ? old('cart_id') : $cartItem->cart->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cart'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cart') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cartItem.fields.cart_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.cartItem.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $cartItem->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cartItem.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qty">{{ trans('cruds.cartItem.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', $cartItem->qty) }}" step="1" required>
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cartItem.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price_cents">{{ trans('cruds.cartItem.fields.price_cents') }}</label>
                <input class="form-control {{ $errors->has('price_cents') ? 'is-invalid' : '' }}" type="number" name="price_cents" id="price_cents" value="{{ old('price_cents', $cartItem->price_cents) }}" step="0.01" required>
                @if($errors->has('price_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cartItem.fields.price_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subtotal_cents">{{ trans('cruds.cartItem.fields.subtotal_cents') }}</label>
                <input class="form-control {{ $errors->has('subtotal_cents') ? 'is-invalid' : '' }}" type="number" name="subtotal_cents" id="subtotal_cents" value="{{ old('subtotal_cents', $cartItem->subtotal_cents) }}" step="0.01" required>
                @if($errors->has('subtotal_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subtotal_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cartItem.fields.subtotal_cents_helper') }}</span>
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