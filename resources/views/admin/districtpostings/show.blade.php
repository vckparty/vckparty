@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.districtposting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.districtpostings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.id') }}
                        </th>
                        <td>
                            {{ $districtposting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.name') }}
                        </th>
                        <td>
                            {{ $districtposting->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.applied_post') }}
                        </th>
                        <td>
                            {{ $districtposting->applied_post }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.current_post') }}
                        </th>
                        <td>
                            {{ $districtposting->current_post }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.district') }}
                        </th>
                        <td>
                            {{ $districtposting->district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.assembly_name') }}
                        </th>
                        <td>
                            {{ $districtposting->assembly_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.social_division') }}
                        </th>
                        <td>
                            {{ $districtposting->social_division }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.education') }}
                        </th>
                        <td>
                            {{ $districtposting->education }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.profession') }}
                        </th>
                        <td>
                            {{ $districtposting->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.join_year') }}
                        </th>
                        <td>
                            {{ $districtposting->join_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.gender') }}
                        </th>
                        <td>
                            {{ $districtposting->gender }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.dob') }}
                        </th>
                        <td>
                            {{ $districtposting->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.mother_name') }}
                        </th>
                        <td>
                            {{ $districtposting->mother_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.father_name') }}
                        </th>
                        <td>
                            {{ $districtposting->father_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.marrital_status') }}
                        </th>
                        <td>
                            {{ $districtposting->marrital_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.permanent_address') }}
                        </th>
                        <td>
                            {{ $districtposting->permanent_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.communication_address') }}
                        </th>
                        <td>
                            {{ $districtposting->communication_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.mobile_number') }}
                        </th>
                        <td>
                            {{ $districtposting->mobile_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.payment_status') }}
                        </th>
                        <td>
                            {{ $districtposting->payment_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.husband_wife_name') }}
                        </th>
                        <td>
                            {{ $districtposting->husband_wife_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.photo') }}
                        </th>
                        <td>
                            @if($districtposting->photo)
                                <a href="{{ $districtposting->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $districtposting->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.documentation') }}
                        </th>
                        <td>
                            @foreach($districtposting->documentation as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.email') }}
                        </th>
                        <td>
                            {{ $districtposting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            குறிப்பு
                        </th>
                        <td>
                            {{ $districtposting->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.selected') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $districtposting->selected ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.selected_post') }}
                        </th>
                        <td>
                            {{ $districtposting->selected_post }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.photo_1') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->photo_1}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->photo_1}}">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.receipt_1') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->receipt_1}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->receipt_1}}">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.receipt_2') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->receipt_2}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->receipt_2}}">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.receipt_3') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->receipt_3}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->receipt_3}}">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_1') }}
                        </th>
                        <td>
                              <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_1}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_1}}">
                            
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_2') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_2}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_2}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_3') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_3}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_3}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_4') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_4}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_4}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_5') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_5}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_5}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_6') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_6}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_6}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_7') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_7}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_7}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_8') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_8}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_8}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_9') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_9}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_9}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.districtposting.fields.document_10') }}
                        </th>
                        <td>
                            <a class="spotlight" href="https://drive.google.com/uc?export=view&id={{ $districtposting->document_10}}">
                              <img style="max-height: 300px; max-width: 300px;" src="https://drive.google.com/uc?export=view&id={{ $districtposting->document_10}}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.districtpostings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection