@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.townpanchayat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.townpanchayats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.townpanchayat.fields.id') }}
                        </th>
                        <td>
                            {{ $townpanchayat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.townpanchayat.fields.name') }}
                        </th>
                        <td>
                            {{ $townpanchayat->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.townpanchayat.fields.district') }}
                        </th>
                        <td>
                            {{ $townpanchayat->district->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.townpanchayats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection