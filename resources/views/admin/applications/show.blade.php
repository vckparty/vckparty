@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.application.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.id') }}
                        </th>
                        <td>
                            {{ $application->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.name') }}
                        </th>
                        <td>
                            {{ $application->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.category') }}
                        </th>
                        <td>
                            {{ $application->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.subcategory') }}
                        </th>
                        <td>
                            {{ $application->subcategory->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.applying_post') }}
                        </th>
                        <td>
                            {{ $application->applying_post->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.social_medias') }}
                        </th>
                        <td>
                            {{ App\Models\Application::SOCIAL_MEDIAS_RADIO[$application->social_medias] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.district') }}
                        </th>
                        <td>
                            {{ $application->district->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.block') }}
                        </th>
                        <td>
                            {{ $application->block->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.panchayat') }}
                        </th>
                        <td>
                            {{ $application->panchayat->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.townpanchayat') }}
                        </th>
                        <td>
                            {{ $application->townpanchayat->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.townvattam') }}
                        </th>
                        <td>
                            {{ $application->townvattam->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.municipality') }}
                        </th>
                        <td>
                            {{ $application->municipality->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.municipalityvattam') }}
                        </th>
                        <td>
                            {{ $application->municipalityvattam->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.metropolitan') }}
                        </th>
                        <td>
                            {{ $application->metropolitan->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.area') }}
                        </th>
                        <td>
                            {{ $application->area->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.metrovattam') }}
                        </th>
                        <td>
                            {{ $application->metrovattam->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.assemblys') }}
                        </th>
                        <td>
                            {{ $application->assemblys->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.facebook') }}
                        </th>
                        <td>
                            {{ $application->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.twitter') }}
                        </th>
                        <td>
                            {{ $application->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.whatsapp_number') }}
                        </th>
                        <td>
                            {{ $application->whatsapp_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.email') }}
                        </th>
                        <td>
                            {{ $application->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.youtube_channel') }}
                        </th>
                        <td>
                            {{ $application->youtube_channel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.instagram') }}
                        </th>
                        <td>
                            {{ $application->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.current_post') }}
                        </th>
                        <td>
                            {{ $application->current_post }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Application::GENDER_RADIO[$application->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.dob') }}
                        </th>
                        <td>
                            {{ $application->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.mother') }}
                        </th>
                        <td>
                            {{ $application->mother }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.father') }}
                        </th>
                        <td>
                            {{ $application->father }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.marrital_status') }}
                        </th>
                        <td>
                            {{ App\Models\Application::MARRITAL_STATUS_RADIO[$application->marrital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.husband_wife_name') }}
                        </th>
                        <td>
                            {{ $application->husband_wife_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.education') }}
                        </th>
                        <td>
                            {{ $application->education }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.profession') }}
                        </th>
                        <td>
                            {{ $application->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.join_date') }}
                        </th>
                        <td>
                            {{ $application->join_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.permanent_address') }}
                        </th>
                        <td>
                            {{ $application->permanent_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.communication_address') }}
                        </th>
                        <td>
                            {{ $application->communication_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.social_category') }}
                        </th>
                        <td>
                            {{ App\Models\Application::SOCIAL_CATEGORY_RADIO[$application->social_category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.notes') }}
                        </th>
                        <td>
                            {{ $application->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.photo') }}
                        </th>
                        <td>
                            @if($application->photo)
                                <a href="{{ $application->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $application->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.payment_status') }}
                        </th>
                        <td>
                            {{ $application->payment_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.payment_receipt') }}
                        </th>
                        <td>
                            @foreach($application->payment_receipt as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.documents') }}
                        </th>
                        <td>
                            @foreach($application->documents as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection