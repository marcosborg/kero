@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.cart.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.cart.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="token">{{ trans('cruds.cart.fields.token') }}</label>
                <input class="form-control {{ $errors->has('token') ? 'is-invalid' : '' }}" type="text" name="token" id="token" value="{{ old('token', '') }}" required>
                @if($errors->has('token'))
                    <div class="invalid-feedback">
                        {{ $errors->first('token') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.token_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency">{{ trans('cruds.cart.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', 'EUR') }}" required>
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="totals">{{ trans('cruds.cart.fields.totals') }}</label>
                <textarea class="form-control {{ $errors->has('totals') ? 'is-invalid' : '' }}" name="totals" id="totals">{{ old('totals') }}</textarea>
                @if($errors->has('totals'))
                    <div class="invalid-feedback">
                        {{ $errors->first('totals') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cart.fields.totals_helper') }}</span>
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