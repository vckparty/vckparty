@extends('layouts.admin')
@section('styles')
<style type="text/css">
  table.dataTable tbody td.select-checkbox:before, table.dataTable tbody th.select-checkbox:before {
    content: ' ';
    margin-top: -6px;
    margin-left: -6px;
    border: 1px solid black;
    border-radius: 3px;
    visibility: hidden;
  }
</style>
@endsection
@section('content')
@can('pondicheryapplication_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pondicheryapplications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pondicheryapplication.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pondicheryapplication.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Pondicheryapplication">
            <thead>
                <tr>
                    <th>
                        &nbsp;
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.subsubcategory') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.districtspondichery') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.pondicheryassemblys') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.current_post') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.dob') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.profession') }}
                    </th>
                    <th>
                        {{ trans('cruds.pondicheryapplication.fields.join_date') }}
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
@can('pondicheryapplication_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pondicheryapplications.massDestroy') }}",
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
    ajax: "{{ route('admin.pondicheryapplications.index') }}",
    columns: [
{ data: 'actions', name: '{{ trans('global.actions') }}' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'subsubcategory_name', name: 'subsubcategory.name' },
{ data: 'districtspondichery_name', name: 'districtspondichery.name' },
{ data: 'pondicheryassemblys_name', name: 'pondicheryassemblys.name' },
{ data: 'email', name: 'email' },
{ data: 'current_post', name: 'current_post' },
{ data: 'dob', name: 'dob' },
{ data: 'profession', name: 'profession' },
{ data: 'join_date', name: 'join_date' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Pondicheryapplication').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection