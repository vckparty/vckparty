@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.meeting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meetings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.id') }}
                        </th>
                        <td>
                            {{ $meeting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.name') }}
                        </th>
                        <td>
                            {{ $meeting->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.father_name') }}
                        </th>
                        <td>
                            {{ $meeting->father_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.educational_qualification') }}
                        </th>
                        <td>
                            {{ $meeting->educational_qualification }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.photo') }}
                        </th>
                        <td>
                            @if($meeting->photo)
                                <a href="{{ $meeting->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $meeting->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.block_area_town_vattam') }}
                        </th>
                        <td>
                            {{ $meeting->block_area_town_vattam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.district') }}
                        </th>
                        <td>
                            {{ $meeting->district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.state') }}
                        </th>
                        <td>
                            {{ $meeting->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.country') }}
                        </th>
                        <td>
                            {{ $meeting->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.current_post') }}
                        </th>
                        <td>
                            {{ $meeting->current_post }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.profession') }}
                        </th>
                        <td>
                            {{ $meeting->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.twitter') }}
                        </th>
                        <td>
                            {{ $meeting->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.facebook') }}
                        </th>
                        <td>
                            {{ $meeting->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.whatsapp_number') }}
                        </th>
                        <td>
                            {{ $meeting->whatsapp_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meeting.fields.instagram') }}
                        </th>
                        <td>
                            {{ $meeting->instagram }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meetings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection