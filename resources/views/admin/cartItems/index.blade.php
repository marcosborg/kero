@extends('layouts.admin')
@section('content')
@can('cart_item_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cart-items.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.cartItem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.cartItem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CartItem">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.cartItem.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.cartItem.fields.cart') }}
                        </th>
                        <th>
                            {{ trans('cruds.cartItem.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.cartItem.fields.qty') }}
                        </th>
                        <th>
                            {{ trans('cruds.cartItem.fields.price_cents') }}
                        </th>
                        <th>
                            {{ trans('cruds.cartItem.fields.subtotal_cents') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $key => $cartItem)
                        <tr data-entry-id="{{ $cartItem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $cartItem->id ?? '' }}
                            </td>
                            <td>
                                {{ $cartItem->cart->token ?? '' }}
                            </td>
                            <td>
                                {{ $cartItem->product->name ?? '' }}
                            </td>
                            <td>
                                {{ $cartItem->qty ?? '' }}
                            </td>
                            <td>
                                {{ $cartItem->price_cents ?? '' }}
                            </td>
                            <td>
                                {{ $cartItem->subtotal_cents ?? '' }}
                            </td>
                            <td>
                                @can('cart_item_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cart-items.show', $cartItem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cart_item_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cart-items.edit', $cartItem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('cart_item_delete')
                                    <form action="{{ route('admin.cart-items.destroy', $cartItem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cart_item_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cart-items.massDestroy') }}",
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
  let table = $('.datatable-CartItem:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection