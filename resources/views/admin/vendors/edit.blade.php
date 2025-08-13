@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vendor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vendors.update", [$vendor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.vendor.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $vendor->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.vendor.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $vendor->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">{{ trans('cruds.vendor.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $vendor->slug) }}" required>
                @if($errors->has('slug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.vendor.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $vendor->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.vendor.fields.status') }}</label>
                @foreach(App\Models\Vendor::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $vendor->status) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="support_email">{{ trans('cruds.vendor.fields.support_email') }}</label>
                <input class="form-control {{ $errors->has('support_email') ? 'is-invalid' : '' }}" type="email" name="support_email" id="support_email" value="{{ old('support_email', $vendor->support_email) }}">
                @if($errors->has('support_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('support_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.support_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="support_phone">{{ trans('cruds.vendor.fields.support_phone') }}</label>
                <input class="form-control {{ $errors->has('support_phone') ? 'is-invalid' : '' }}" type="text" name="support_phone" id="support_phone" value="{{ old('support_phone', $vendor->support_phone) }}">
                @if($errors->has('support_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('support_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.support_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.vendor.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="text" name="tax" id="tax" value="{{ old('tax', $vendor->tax) }}">
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_name">{{ trans('cruds.vendor.fields.invoice_name') }}</label>
                <input class="form-control {{ $errors->has('invoice_name') ? 'is-invalid' : '' }}" type="text" name="invoice_name" id="invoice_name" value="{{ old('invoice_name', $vendor->invoice_name) }}">
                @if($errors->has('invoice_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.invoice_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.vendor.fields.payout_method') }}</label>
                @foreach(App\Models\Vendor::PAYOUT_METHOD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('payout_method') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="payout_method_{{ $key }}" name="payout_method" value="{{ $key }}" {{ old('payout_method', $vendor->payout_method) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="payout_method_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('payout_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payout_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.payout_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payout_data">{{ trans('cruds.vendor.fields.payout_data') }}</label>
                <textarea class="form-control {{ $errors->has('payout_data') ? 'is-invalid' : '' }}" name="payout_data" id="payout_data">{{ old('payout_data', $vendor->payout_data) }}</textarea>
                @if($errors->has('payout_data'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payout_data') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vendor.fields.payout_data_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.vendors.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $vendor->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection