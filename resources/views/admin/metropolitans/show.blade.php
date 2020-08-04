@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.metropolitan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.metropolitans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.metropolitan.fields.id') }}
                        </th>
                        <td>
                            {{ $metropolitan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metropolitan.fields.name') }}
                        </th>
                        <td>
                            {{ $metropolitan->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.metropolitan.fields.district') }}
                        </th>
                        <td>
                            {{ $metropolitan->district->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.metropolitans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection