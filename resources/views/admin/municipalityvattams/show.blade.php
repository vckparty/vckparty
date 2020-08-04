@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.municipalityvattam.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.municipalityvattams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.municipalityvattam.fields.id') }}
                        </th>
                        <td>
                            {{ $municipalityvattam->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipalityvattam.fields.name') }}
                        </th>
                        <td>
                            {{ $municipalityvattam->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.municipalityvattam.fields.municipality') }}
                        </th>
                        <td>
                            {{ $municipalityvattam->municipality->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.municipalityvattams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection