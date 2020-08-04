@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.posting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.postings.update", [$posting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.posting.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $posting->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.posting.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ ($posting->category ? $posting->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subcategory_id">{{ trans('cruds.posting.fields.subcategory') }}</label>
                <select class="form-control select2 {{ $errors->has('subcategory') ? 'is-invalid' : '' }}" name="subcategory_id" id="subcategory_id" required>
                    @foreach($subcategories as $id => $subcategory)
                        <option value="{{ $id }}" {{ ($posting->subcategory ? $posting->subcategory->id : old('subcategory_id')) == $id ? 'selected' : '' }}>{{ $subcategory }}</option>
                    @endforeach
                </select>
                @if($errors->has('subcategory'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subcategory') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.subcategory_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="posts_id">{{ trans('cruds.posting.fields.posts') }}</label>
                <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="posts_id" id="posts_id">
                    @foreach($posts as $id => $posts)
                        <option value="{{ $id }}" {{ ($posting->posts ? $posting->posts->id : old('posts_id')) == $id ? 'selected' : '' }}>{{ $posts }}</option>
                    @endforeach
                </select>
                @if($errors->has('posts'))
                    <div class="invalid-feedback">
                        {{ $errors->first('posts') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.posts_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="district_id">{{ trans('cruds.posting.fields.district') }}</label>
                <select class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district_id" id="district_id" required>
                    @foreach($districts as $id => $district)
                        <option value="{{ $id }}" {{ ($posting->district ? $posting->district->id : old('district_id')) == $id ? 'selected' : '' }}>{{ $district }}</option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="block_id">{{ trans('cruds.posting.fields.block') }}</label>
                <select class="form-control select2 {{ $errors->has('block') ? 'is-invalid' : '' }}" name="block_id" id="block_id">
                    @foreach($blocks as $id => $block)
                        <option value="{{ $id }}" {{ ($posting->block ? $posting->block->id : old('block_id')) == $id ? 'selected' : '' }}>{{ $block }}</option>
                    @endforeach
                </select>
                @if($errors->has('block'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.block_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="panchayat_id">{{ trans('cruds.posting.fields.panchayat') }}</label>
                <select class="form-control select2 {{ $errors->has('panchayat') ? 'is-invalid' : '' }}" name="panchayat_id" id="panchayat_id">
                    @foreach($panchayats as $id => $panchayat)
                        <option value="{{ $id }}" {{ ($posting->panchayat ? $posting->panchayat->id : old('panchayat_id')) == $id ? 'selected' : '' }}>{{ $panchayat }}</option>
                    @endforeach
                </select>
                @if($errors->has('panchayat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('panchayat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.panchayat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="townpanchayat_id">{{ trans('cruds.posting.fields.townpanchayat') }}</label>
                <select class="form-control select2 {{ $errors->has('townpanchayat') ? 'is-invalid' : '' }}" name="townpanchayat_id" id="townpanchayat_id">
                    @foreach($townpanchayats as $id => $townpanchayat)
                        <option value="{{ $id }}" {{ ($posting->townpanchayat ? $posting->townpanchayat->id : old('townpanchayat_id')) == $id ? 'selected' : '' }}>{{ $townpanchayat }}</option>
                    @endforeach
                </select>
                @if($errors->has('townpanchayat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('townpanchayat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.townpanchayat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="townvattam_id">{{ trans('cruds.posting.fields.townvattam') }}</label>
                <select class="form-control select2 {{ $errors->has('townvattam') ? 'is-invalid' : '' }}" name="townvattam_id" id="townvattam_id">
                    @foreach($townvattams as $id => $townvattam)
                        <option value="{{ $id }}" {{ ($posting->townvattam ? $posting->townvattam->id : old('townvattam_id')) == $id ? 'selected' : '' }}>{{ $townvattam }}</option>
                    @endforeach
                </select>
                @if($errors->has('townvattam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('townvattam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.townvattam_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="municipality_id">{{ trans('cruds.posting.fields.municipality') }}</label>
                <select class="form-control select2 {{ $errors->has('municipality') ? 'is-invalid' : '' }}" name="municipality_id" id="municipality_id">
                    @foreach($municipalities as $id => $municipality)
                        <option value="{{ $id }}" {{ ($posting->municipality ? $posting->municipality->id : old('municipality_id')) == $id ? 'selected' : '' }}>{{ $municipality }}</option>
                    @endforeach
                </select>
                @if($errors->has('municipality'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municipality') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.municipality_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="municipalityvattam_id">{{ trans('cruds.posting.fields.municipalityvattam') }}</label>
                <select class="form-control select2 {{ $errors->has('municipalityvattam') ? 'is-invalid' : '' }}" name="municipalityvattam_id" id="municipalityvattam_id">
                    @foreach($municipalityvattams as $id => $municipalityvattam)
                        <option value="{{ $id }}" {{ ($posting->municipalityvattam ? $posting->municipalityvattam->id : old('municipalityvattam_id')) == $id ? 'selected' : '' }}>{{ $municipalityvattam }}</option>
                    @endforeach
                </select>
                @if($errors->has('municipalityvattam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municipalityvattam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.municipalityvattam_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="metropolitan_id">{{ trans('cruds.posting.fields.metropolitan') }}</label>
                <select class="form-control select2 {{ $errors->has('metropolitan') ? 'is-invalid' : '' }}" name="metropolitan_id" id="metropolitan_id">
                    @foreach($metropolitans as $id => $metropolitan)
                        <option value="{{ $id }}" {{ ($posting->metropolitan ? $posting->metropolitan->id : old('metropolitan_id')) == $id ? 'selected' : '' }}>{{ $metropolitan }}</option>
                    @endforeach
                </select>
                @if($errors->has('metropolitan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('metropolitan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.metropolitan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="area_id">{{ trans('cruds.posting.fields.area') }}</label>
                <select class="form-control select2 {{ $errors->has('area') ? 'is-invalid' : '' }}" name="area_id" id="area_id">
                    @foreach($areas as $id => $area)
                        <option value="{{ $id }}" {{ ($posting->area ? $posting->area->id : old('area_id')) == $id ? 'selected' : '' }}>{{ $area }}</option>
                    @endforeach
                </select>
                @if($errors->has('area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="metrovattam_id">{{ trans('cruds.posting.fields.metrovattam') }}</label>
                <select class="form-control select2 {{ $errors->has('metrovattam') ? 'is-invalid' : '' }}" name="metrovattam_id" id="metrovattam_id">
                    @foreach($metrovattams as $id => $metrovattam)
                        <option value="{{ $id }}" {{ ($posting->metrovattam ? $posting->metrovattam->id : old('metrovattam_id')) == $id ? 'selected' : '' }}>{{ $metrovattam }}</option>
                    @endforeach
                </select>
                @if($errors->has('metrovattam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('metrovattam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.metrovattam_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="assemblys_id">{{ trans('cruds.posting.fields.assemblys') }}</label>
                <select class="form-control select2 {{ $errors->has('assemblys') ? 'is-invalid' : '' }}" name="assemblys_id" id="assemblys_id" required>
                    @foreach($assemblys as $id => $assemblys)
                        <option value="{{ $id }}" {{ ($posting->assemblys ? $posting->assemblys->id : old('assemblys_id')) == $id ? 'selected' : '' }}>{{ $assemblys }}</option>
                    @endforeach
                </select>
                @if($errors->has('assemblys'))
                    <div class="invalid-feedback">
                        {{ $errors->first('assemblys') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.assemblys_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.posting.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $posting->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.posting.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $posting->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="whatsapp_number">{{ trans('cruds.posting.fields.whatsapp_number') }}</label>
                <input class="form-control {{ $errors->has('whatsapp_number') ? 'is-invalid' : '' }}" type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $posting->whatsapp_number) }}">
                @if($errors->has('whatsapp_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whatsapp_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.whatsapp_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.posting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $posting->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube_channel">{{ trans('cruds.posting.fields.youtube_channel') }}</label>
                <input class="form-control {{ $errors->has('youtube_channel') ? 'is-invalid' : '' }}" type="text" name="youtube_channel" id="youtube_channel" value="{{ old('youtube_channel', $posting->youtube_channel) }}">
                @if($errors->has('youtube_channel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube_channel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.youtube_channel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.posting.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $posting->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.posting.fields.gender') }}</label>
                @foreach(App\Models\Posting::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $posting->gender) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="blood_group">{{ trans('cruds.posting.fields.blood_group') }}</label>
                <input class="form-control {{ $errors->has('blood_group') ? 'is-invalid' : '' }}" type="text" name="blood_group" id="blood_group" value="{{ old('blood_group', $posting->blood_group) }}">
                @if($errors->has('blood_group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('blood_group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.blood_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dob">{{ trans('cruds.posting.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $posting->dob) }}" required>
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mother">{{ trans('cruds.posting.fields.mother') }}</label>
                <input class="form-control {{ $errors->has('mother') ? 'is-invalid' : '' }}" type="text" name="mother" id="mother" value="{{ old('mother', $posting->mother) }}" required>
                @if($errors->has('mother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father">{{ trans('cruds.posting.fields.father') }}</label>
                <input class="form-control {{ $errors->has('father') ? 'is-invalid' : '' }}" type="text" name="father" id="father" value="{{ old('father', $posting->father) }}" required>
                @if($errors->has('father'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.father_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.posting.fields.marrital_status') }}</label>
                @foreach(App\Models\Posting::MARRITAL_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('marrital_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="marrital_status_{{ $key }}" name="marrital_status" value="{{ $key }}" {{ old('marrital_status', $posting->marrital_status) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="marrital_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('marrital_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marrital_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.marrital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="husband_wife_name">{{ trans('cruds.posting.fields.husband_wife_name') }}</label>
                <input class="form-control {{ $errors->has('husband_wife_name') ? 'is-invalid' : '' }}" type="text" name="husband_wife_name" id="husband_wife_name" value="{{ old('husband_wife_name', $posting->husband_wife_name) }}">
                @if($errors->has('husband_wife_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('husband_wife_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.husband_wife_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="education">{{ trans('cruds.posting.fields.education') }}</label>
                <input class="form-control {{ $errors->has('education') ? 'is-invalid' : '' }}" type="text" name="education" id="education" value="{{ old('education', $posting->education) }}" required>
                @if($errors->has('education'))
                    <div class="invalid-feedback">
                        {{ $errors->first('education') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.education_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="profession">{{ trans('cruds.posting.fields.profession') }}</label>
                <input class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}" type="text" name="profession" id="profession" value="{{ old('profession', $posting->profession) }}" required>
                @if($errors->has('profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="join_date">{{ trans('cruds.posting.fields.join_date') }}</label>
                <input class="form-control {{ $errors->has('join_date') ? 'is-invalid' : '' }}" type="text" name="join_date" id="join_date" value="{{ old('join_date', $posting->join_date) }}">
                @if($errors->has('join_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('join_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.join_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permanent_address">{{ trans('cruds.posting.fields.permanent_address') }}</label>
                <textarea class="form-control {{ $errors->has('permanent_address') ? 'is-invalid' : '' }}" name="permanent_address" id="permanent_address" required>{{ old('permanent_address', $posting->permanent_address) }}</textarea>
                @if($errors->has('permanent_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permanent_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.permanent_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="communication_address">{{ trans('cruds.posting.fields.communication_address') }}</label>
                <textarea class="form-control {{ $errors->has('communication_address') ? 'is-invalid' : '' }}" name="communication_address" id="communication_address" required>{{ old('communication_address', $posting->communication_address) }}</textarea>
                @if($errors->has('communication_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('communication_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.communication_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.posting.fields.social_category') }}</label>
                @foreach(App\Models\Posting::SOCIAL_CATEGORY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('social_category') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="social_category_{{ $key }}" name="social_category" value="{{ $key }}" {{ old('social_category', $posting->social_category) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="social_category_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('social_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('social_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.social_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.posting.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $posting->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.posting.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.posting.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.postings.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 1920,
      height: 1920
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($posting) && $posting->photo)
      var file = {!! json_encode($posting->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection