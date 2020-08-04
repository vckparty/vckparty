@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pondicheryposting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pondicherypostings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.id') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.name') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.categorypondichery') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->categorypondichery->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.subcategorypondichery') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->subcategorypondichery->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.subsubcategory') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->subsubcategory->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.districtspondichery') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->districtspondichery->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.pondicheryassembly') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->pondicheryassembly->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.facebook') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.twitter') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.whatsapp_number') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->whatsapp_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.email') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.youtube_channel') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->youtube_channel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.instagram') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Pondicheryposting::GENDER_RADIO[$pondicheryposting->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.blood_group') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->blood_group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.dob') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.mother') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->mother }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.father') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->father }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.marrital_status') }}
                        </th>
                        <td>
                            {{ App\Models\Pondicheryposting::MARRITAL_STATUS_RADIO[$pondicheryposting->marrital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.husband_wife_name') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->husband_wife_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.education') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->education }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.profession') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.join_date') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->join_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.permanent_address') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->permanent_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.communication_address') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->communication_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.social_category') }}
                        </th>
                        <td>
                            {{ App\Models\Pondicheryposting::SOCIAL_CATEGORY_RADIO[$pondicheryposting->social_category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.notes') }}
                        </th>
                        <td>
                            {{ $pondicheryposting->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryposting.fields.photo') }}
                        </th>
                        <td>
                            @if($pondicheryposting->photo)
                                <a href="{{ $pondicheryposting->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $pondicheryposting->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pondicherypostings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection