@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.address.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addresses.update", [$address->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="addressable_type">{{ trans('cruds.address.fields.addressable_type') }}</label>
                <input class="form-control {{ $errors->has('addressable_type') ? 'is-invalid' : '' }}" type="text" name="addressable_type" id="addressable_type" value="{{ old('addressable_type', $address->addressable_type) }}" required>
                @if($errors->has('addressable_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('addressable_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.addressable_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="addressable">{{ trans('cruds.address.fields.addressable') }}</label>
                <input class="form-control {{ $errors->has('addressable') ? 'is-invalid' : '' }}" type="number" name="addressable" id="addressable" value="{{ old('addressable', $address->addressable) }}" step="1" required>
                @if($errors->has('addressable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('addressable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.addressable_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.address.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $address->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="line_1">{{ trans('cruds.address.fields.line_1') }}</label>
                <input class="form-control {{ $errors->has('line_1') ? 'is-invalid' : '' }}" type="text" name="line_1" id="line_1" value="{{ old('line_1', $address->line_1) }}" required>
                @if($errors->has('line_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('line_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.line_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="line_2">{{ trans('cruds.address.fields.line_2') }}</label>
                <input class="form-control {{ $errors->has('line_2') ? 'is-invalid' : '' }}" type="text" name="line_2" id="line_2" value="{{ old('line_2', $address->line_2) }}">
                @if($errors->has('line_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('line_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.line_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.address.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $address->city) }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="postcode">{{ trans('cruds.address.fields.postcode') }}</label>
                <input class="form-control {{ $errors->has('postcode') ? 'is-invalid' : '' }}" type="text" name="postcode" id="postcode" value="{{ old('postcode', $address->postcode) }}" required>
                @if($errors->has('postcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('postcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.postcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country_id">{{ trans('cruds.address.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id" required>
                    @foreach($countries as $id => $entry)
                        <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $address->country->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.address.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $address->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.phone_helper') }}</span>
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