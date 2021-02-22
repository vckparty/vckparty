@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.training.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trainings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.id') }}
                        </th>
                        <td>
                            {{ $training->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.name') }}
                        </th>
                        <td>
                            {{ $training->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.district') }}
                        </th>
                        <td>
                            {{ $training->district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.assembly') }}
                        </th>
                        <td>
                            {{ $training->assembly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.dob') }}
                        </th>
                        <td>
                            {{ $training->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.father_name') }}
                        </th>
                        <td>
                            {{ $training->father_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Training::GENDER_RADIO[$training->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.email') }}
                        </th>
                        <td>
                            {{ $training->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.facebook') }}
                        </th>
                        <td>
                            {{ $training->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.twitter') }}
                        </th>
                        <td>
                            {{ $training->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.whatsapp_number') }}
                        </th>
                        <td>
                            {{ $training->whatsapp_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.youtube_channel') }}
                        </th>
                        <td>
                            {{ $training->youtube_channel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.instagram') }}
                        </th>
                        <td>
                            {{ $training->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.interested_in') }}
                        </th>
                        <td>
                            {{ App\Models\Training::INTERESTED_IN_SELECT[$training->interested_in] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.education') }}
                        </th>
                        <td>
                            {{ $training->education }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.profession') }}
                        </th>
                        <td>
                            {{ $training->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.address') }}
                        </th>
                        <td>
                            {{ $training->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.training.fields.photo') }}
                        </th>
                        <td>
                            @if($training->photo)
                                <a href="{{ $training->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $training->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trainings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection