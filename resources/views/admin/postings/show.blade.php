@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.posting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.postings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.id') }}
                        </th>
                        <td>
                            {{ $posting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.name') }}
                        </th>
                        <td>
                            {{ $posting->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.category') }}
                        </th>
                        <td>
                            {{ $posting->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.subcategory') }}
                        </th>
                        <td>
                            {{ $posting->subcategory->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.posts') }}
                        </th>
                        <td>
                            {{ $posting->posts->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.district') }}
                        </th>
                        <td>
                            {{ $posting->district->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.block') }}
                        </th>
                        <td>
                            {{ $posting->block->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.panchayat') }}
                        </th>
                        <td>
                            {{ $posting->panchayat->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.townpanchayat') }}
                        </th>
                        <td>
                            {{ $posting->townpanchayat->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.townvattam') }}
                        </th>
                        <td>
                            {{ $posting->townvattam->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.municipality') }}
                        </th>
                        <td>
                            {{ $posting->municipality->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.municipalityvattam') }}
                        </th>
                        <td>
                            {{ $posting->municipalityvattam->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.metropolitan') }}
                        </th>
                        <td>
                            {{ $posting->metropolitan->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.area') }}
                        </th>
                        <td>
                            {{ $posting->area->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.metrovattam') }}
                        </th>
                        <td>
                            {{ $posting->metrovattam->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.assemblys') }}
                        </th>
                        <td>
                            {{ $posting->assemblys->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.facebook') }}
                        </th>
                        <td>
                            {{ $posting->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.twitter') }}
                        </th>
                        <td>
                            {{ $posting->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.whatsapp_number') }}
                        </th>
                        <td>
                            {{ $posting->whatsapp_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.email') }}
                        </th>
                        <td>
                            {{ $posting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.youtube_channel') }}
                        </th>
                        <td>
                            {{ $posting->youtube_channel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.instagram') }}
                        </th>
                        <td>
                            {{ $posting->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Posting::GENDER_RADIO[$posting->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.blood_group') }}
                        </th>
                        <td>
                            {{ $posting->blood_group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.dob') }}
                        </th>
                        <td>
                            {{ $posting->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.mother') }}
                        </th>
                        <td>
                            {{ $posting->mother }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.father') }}
                        </th>
                        <td>
                            {{ $posting->father }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.marrital_status') }}
                        </th>
                        <td>
                            {{ App\Models\Posting::MARRITAL_STATUS_RADIO[$posting->marrital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.husband_wife_name') }}
                        </th>
                        <td>
                            {{ $posting->husband_wife_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.education') }}
                        </th>
                        <td>
                            {{ $posting->education }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.profession') }}
                        </th>
                        <td>
                            {{ $posting->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.join_date') }}
                        </th>
                        <td>
                            {{ $posting->join_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.permanent_address') }}
                        </th>
                        <td>
                            {{ $posting->permanent_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.communication_address') }}
                        </th>
                        <td>
                            {{ $posting->communication_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.social_category') }}
                        </th>
                        <td>
                            {{ App\Models\Posting::SOCIAL_CATEGORY_RADIO[$posting->social_category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.notes') }}
                        </th>
                        <td>
                            {{ $posting->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.posting.fields.photo') }}
                        </th>
                        <td>
                            @if($posting->photo)
                                <a href="{{ $posting->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $posting->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.postings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection