@extends('layouts.admin')
@section('content')
@can('application_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.applications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.application.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.application.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Application">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.application.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.subcategory') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.applying_post') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.district') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.assemblys') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.current_post') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.dob') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.profession') }}
                    </th>
                    <th>
                        {{ trans('cruds.application.fields.join_date') }}
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
@can('application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.applications.massDestroy') }}",
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
    ajax: "{{ route('admin.applications.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'category_name', name: 'category.name' },
{ data: 'subcategory_name', name: 'subcategory.name' },
{ data: 'applying_post_name', name: 'applying_post.name' },
{ data: 'district_name', name: 'district.name' },
{ data: 'assemblys_name', name: 'assemblys.name' },
{ data: 'email', name: 'email' },
{ data: 'current_post', name: 'current_post' },
{ data: 'dob', name: 'dob' },
{ data: 'profession', name: 'profession' },
{ data: 'join_date', name: 'join_date' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Application').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection