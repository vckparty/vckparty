@extends('layouts.admin')
@section('content')
@can('pondicheryposting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pondicherypostings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pondicheryposting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pondicheryposting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Pondicheryposting">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.pondicheryposting.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryposting.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryposting.fields.categorypondichery') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryposting.fields.districtspondichery') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryposting.fields.pondicheryassembly') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryposting.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryposting.fields.dob') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryposting.fields.profession') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryposting.fields.join_date') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('pondicheryposting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pondicherypostings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.pondicherypostings.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'categorypondichery_name', name: 'categorypondichery.name' },
{ data: 'districtspondichery_name', name: 'districtspondichery.name' },
{ data: 'pondicheryassembly_name', name: 'pondicheryassembly.name' },
{ data: 'email', name: 'email' },
{ data: 'dob', name: 'dob' },
{ data: 'profession', name: 'profession' },
{ data: 'join_date', name: 'join_date' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Pondicheryposting').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection