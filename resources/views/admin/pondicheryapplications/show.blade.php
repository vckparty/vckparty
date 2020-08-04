@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pondicheryapplication.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pondicheryapplications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.id') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.name') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.categorypondichery') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->categorypondichery->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.subcategorypondichery') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->subcategorypondichery->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.subsubcategory') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->subsubcategory->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.districtspondichery') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->districtspondichery->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.pondicheryassemblys') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->pondicheryassemblys->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.social_medias') }}
                        </th>
                        <td>
                            {{ App\Models\Pondicheryapplication::SOCIAL_MEDIAS_RADIO[$pondicheryapplication->social_medias] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.facebook') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.twitter') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.whatsapp_number') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->whatsapp_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.email') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.youtube_channel') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->youtube_channel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.instagram') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.current_post') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->current_post }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Pondicheryapplication::GENDER_RADIO[$pondicheryapplication->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.dob') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.mother') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->mother }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.father') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->father }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.marrital_status') }}
                        </th>
                        <td>
                            {{ App\Models\Pondicheryapplication::MARRITAL_STATUS_RADIO[$pondicheryapplication->marrital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.husband_wife_name') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->husband_wife_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.education') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->education }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.profession') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.join_date') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->join_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.permanent_address') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->permanent_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.communication_address') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->communication_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.social_category') }}
                        </th>
                        <td>
                            {{ App\Models\Pondicheryapplication::SOCIAL_CATEGORY_RADIO[$pondicheryapplication->social_category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.notes') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.photo') }}
                        </th>
                        <td>
                            @if($pondicheryapplication->photo)
                                <a href="{{ $pondicheryapplication->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $pondicheryapplication->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.payment_status') }}
                        </th>
                        <td>
                            {{ $pondicheryapplication->payment_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.payment_receipt') }}
                        </th>
                        <td>
                            @foreach($pondicheryapplication->payment_receipt as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pondicheryapplication.fields.documents') }}
                        </th>
                        <td>
                            @foreach($pondicheryapplication->documents as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pondicheryapplications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection