@extends('layouts.admin')
@section('content')
@can('districtposting_create')
    <!-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.districtpostings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.districtposting.title_singular') }}
            </a>
        </div>
    </div> -->
@endcan

<div class="card">
    <div class="card-header">
        Filter Postings
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("postingresult") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('districted', 'மாவட்டம்', ['class' => 'awesome']); !!}
                        {!! Form::select('districted', $districts, null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('selected_post', 'பொறுப்பு', ['class' => 'awesome']); !!}
                        {!! Form::select('selected_post', ['மாவட்டச் செயலாளர்' => 'மாவட்டச் செயலாளர்', 'மாவட்டப் பொருளாளர்' => 'மாவட்டப் பொருளாளர்', 'செய்தி தொடர்பாளர்' => 'செய்தி தொடர்பாளர்', 'மாவட்ட துணைச் செயலாளர்' => 'மாவட்ட துணைச் செயலாளர்', 'செயற்குழு உறுப்பினர்' => 'செயற்குழு உறுப்பினர்'], null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('assembly_name', 'சட்ட மன்ற தொகுதி', ['class' => 'awesome']); !!}
                        {!! Form::select('assembly_name', $assembly_names, null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('social_division', 'சமூகப் பிரிவு', ['class' => 'awesome']); !!}
                        {!! Form::select('social_division', ['பிற்படுத்தப்பட்டவர் (BC/MBC)' => 'பிற்படுத்தப்பட்டவர் (BC/MBC)', 'முன்னேறிய வகுப்பினர் (FC)' => 'முன்னேறிய வகுப்பினர் (FC)', 'பழங்குடியினர்' => 'பழங்குடியினர்', 'இசுலாமியர்' => 'இசுலாமியர்', 'கிறித்தவர்' => 'கிறித்தவர்'], null, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary col-md-12" type="submit">
                        Search
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.districtposting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Districtposting">
                <thead>
                    <tr>
                        <th width="10">
                            
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.district') }}
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.assembly_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.social_division') }}
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.education') }}
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.profession') }}
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.join_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.selected') }}
                        </th>
                        <th>
                            {{ trans('cruds.districtposting.fields.selected_post') }}
                        </th>
                        <th>
                            ID&nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($searchResults as $key => $searchResult)
                        <tr data-entry-id="{{ $searchResult->id }}">
                            <td><br>
                                <a class="btn btn-xs btn-success" href="{{ route('idcarddesign', ['id' => $searchResult->id]) }}">
                                        Card
                                    </a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('letterheaddesign', ['id' => $searchResult->id]) }}">
                                        Letter
                                    </a>
                            </td>
                            <td>
                                @can('districtposting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.districtpostings.show', $searchResult->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                    
                                @can('districtposting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.districtpostings.edit', $searchResult->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('districtposting_delete')
                                    <form action="{{ route('admin.districtpostings.destroy', $searchResult->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                            <td>
                                {{ $searchResult->name ?? '' }}
                            </td>
                            <td>
                                {{ $searchResult->district ?? '' }}
                            </td>
                            <td>
                                {{ $searchResult->assembly_name ?? '' }}
                            </td>
                            <td>
                                {{ $searchResult->social_division ?? '' }}
                            </td>
                            <td>
                                {{ $searchResult->education ?? '' }}
                            </td>
                            <td>
                                {{ $searchResult->profession ?? '' }}
                            </td>
                            <td>
                                {{ $searchResult->join_year ?? '' }}
                            </td>
                            <td>
                                {{ $searchResult->gender ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $searchResult->selected ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $searchResult->selected ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $searchResult->selected_post ?? '' }}
                            </td>
                            <td>
                                {{ $searchResult->id ?? '' }}
                                

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
@can('districtposting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.districtpostings.massDestroy') }}",
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
  let table = $('.datatable-Districtposting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection