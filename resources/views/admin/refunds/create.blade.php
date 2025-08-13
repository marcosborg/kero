@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.refund.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.refunds.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="order_id">{{ trans('cruds.refund.fields.order') }}</label>
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
                <span class="help-block">{{ trans('cruds.refund.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount_cents">{{ trans('cruds.refund.fields.amount_cents') }}</label>
                <input class="form-control {{ $errors->has('amount_cents') ? 'is-invalid' : '' }}" type="number" name="amount_cents" id="amount_cents" value="{{ old('amount_cents', '') }}" step="1" required>
                @if($errors->has('amount_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.refund.fields.amount_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reason">{{ trans('cruds.refund.fields.reason') }}</label>
                <input class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" type="text" name="reason" id="reason" value="{{ old('reason', '') }}">
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.refund.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.refund.fields.status') }}</label>
                @foreach(App\Models\Refund::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', 'requested') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.refund.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payload">{{ trans('cruds.refund.fields.payload') }}</label>
                <textarea class="form-control {{ $errors->has('payload') ? 'is-invalid' : '' }}" name="payload" id="payload">{{ old('payload') }}</textarea>
                @if($errors->has('payload'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payload') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.refund.fields.payload_helper') }}</span>
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