@extends('layouts.admin')
@section('content')
@can('refund_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.refunds.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.refund.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.refund.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Refund">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.refund.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.refund.fields.order') }}
                        </th>
                        <th>
                            {{ trans('cruds.refund.fields.amount_cents') }}
                        </th>
                        <th>
                            {{ trans('cruds.refund.fields.reason') }}
                        </th>
                        <th>
                            {{ trans('cruds.refund.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.refund.fields.payload') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($refunds as $key => $refund)
                        <tr data-entry-id="{{ $refund->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $refund->id ?? '' }}
                            </td>
                            <td>
                                {{ $refund->order->code ?? '' }}
                            </td>
                            <td>
                                {{ $refund->amount_cents ?? '' }}
                            </td>
                            <td>
                                {{ $refund->reason ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Refund::STATUS_RADIO[$refund->status] ?? '' }}
                            </td>
                            <td>
                                {{ $refund->payload ?? '' }}
                            </td>
                            <td>
                                @can('refund_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.refunds.show', $refund->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('refund_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.refunds.edit', $refund->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('refund_delete')
                                    <form action="{{ route('admin.refunds.destroy', $refund->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('refund_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.refunds.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Refund:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection