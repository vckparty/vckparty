@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.metrovattam.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.metrovattams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.metrovattam.fields.id') }}
                        </th>
                        <td>
                            {{ $metrovattam->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metrovattam.fields.name') }}
                        </th>
                        <td>
                            {{ $metrovattam->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metrovattam.fields.area') }}
                        </th>
                        <td>
                            {{ $metrovattam->area->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.metrovattams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection