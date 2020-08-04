@extends('layouts.admin')
@section('content')
@can('posting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.postings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.posting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.posting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Posting">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.posting.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.posting.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.posting.fields.posts') }}
                    </th>
                    <th>
                        {{ trans('cruds.posting.fields.district') }}
                    </th>
                    <th>
                        {{ trans('cruds.posting.fields.assemblys') }}
                    </th>
                    <th>
                        {{ trans('cruds.posting.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.posting.fields.dob') }}
                    </th>
                    <th>
                        {{ trans('cruds.posting.fields.profession') }}
                    </th>
                    <th>
                        {{ trans('cruds.posting.fields.join_date') }}
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
@can('posting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.postings.massDestroy') }}",
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
    ajax: "{{ route('admin.postings.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'posts_name', name: 'posts.name' },
{ data: 'district_name', name: 'district.name' },
{ data: 'assemblys_name', name: 'assemblys.name' },
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
  let table = $('.datatable-Posting').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection