@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payout.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payouts.update", [$payout->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="vendor_id">{{ trans('cruds.payout.fields.vendor') }}</label>
                <select class="form-control select2 {{ $errors->has('vendor') ? 'is-invalid' : '' }}" name="vendor_id" id="vendor_id" required>
                    @foreach($vendors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('vendor_id') ? old('vendor_id') : $payout->vendor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vendor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vendor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payout.fields.vendor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="period_start">{{ trans('cruds.payout.fields.period_start') }}</label>
                <input class="form-control date {{ $errors->has('period_start') ? 'is-invalid' : '' }}" type="text" name="period_start" id="period_start" value="{{ old('period_start', $payout->period_start) }}" required>
                @if($errors->has('period_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('period_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payout.fields.period_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="period_end">{{ trans('cruds.payout.fields.period_end') }}</label>
                <input class="form-control date {{ $errors->has('period_end') ? 'is-invalid' : '' }}" type="text" name="period_end" id="period_end" value="{{ old('period_end', $payout->period_end) }}" required>
                @if($errors->has('period_end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('period_end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payout.fields.period_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gross_cents">{{ trans('cruds.payout.fields.gross_cents') }}</label>
                <input class="form-control {{ $errors->has('gross_cents') ? 'is-invalid' : '' }}" type="number" name="gross_cents" id="gross_cents" value="{{ old('gross_cents', $payout->gross_cents) }}" step="1" required>
                @if($errors->has('gross_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gross_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payout.fields.gross_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="commissions_cents">{{ trans('cruds.payout.fields.commissions_cents') }}</label>
                <input class="form-control {{ $errors->has('commissions_cents') ? 'is-invalid' : '' }}" type="number" name="commissions_cents" id="commissions_cents" value="{{ old('commissions_cents', $payout->commissions_cents) }}" step="1" required>
                @if($errors->has('commissions_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('commissions_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payout.fields.commissions_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="refunds_cents">{{ trans('cruds.payout.fields.refunds_cents') }}</label>
                <input class="form-control {{ $errors->has('refunds_cents') ? 'is-invalid' : '' }}" type="number" name="refunds_cents" id="refunds_cents" value="{{ old('refunds_cents', $payout->refunds_cents) }}" step="1" required>
                @if($errors->has('refunds_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('refunds_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payout.fields.refunds_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="net_cents">{{ trans('cruds.payout.fields.net_cents') }}</label>
                <input class="form-control {{ $errors->has('net_cents') ? 'is-invalid' : '' }}" type="number" name="net_cents" id="net_cents" value="{{ old('net_cents', $payout->net_cents) }}" step="1" required>
                @if($errors->has('net_cents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('net_cents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payout.fields.net_cents_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.payout.fields.status') }}</label>
                @foreach(App\Models\Payout::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $payout->status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payout.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payload">{{ trans('cruds.payout.fields.payload') }}</label>
                <textarea class="form-control {{ $errors->has('payload') ? 'is-invalid' : '' }}" name="payload" id="payload">{{ old('payload', $payout->payload) }}</textarea>
                @if($errors->has('payload'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payload') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payout.fields.payload_helper') }}</span>
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