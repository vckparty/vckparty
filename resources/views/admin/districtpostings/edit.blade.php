@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.districtposting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.districtpostings.update", [$districtposting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.districtposting.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $districtposting->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="applied_post">{{ trans('cruds.districtposting.fields.applied_post') }}</label>
                <input class="form-control {{ $errors->has('applied_post') ? 'is-invalid' : '' }}" type="text" name="applied_post" id="applied_post" value="{{ old('applied_post', $districtposting->applied_post) }}">
                @if($errors->has('applied_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('applied_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.applied_post_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="current_post">{{ trans('cruds.districtposting.fields.current_post') }}</label>
                <input class="form-control {{ $errors->has('current_post') ? 'is-invalid' : '' }}" type="text" name="current_post" id="current_post" value="{{ old('current_post', $districtposting->current_post) }}">
                @if($errors->has('current_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.current_post_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="district">{{ trans('cruds.districtposting.fields.district') }}</label>
                <input class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" id="district" value="{{ old('district', $districtposting->district) }}">
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="assembly_name">{{ trans('cruds.districtposting.fields.assembly_name') }}</label>
                <input class="form-control {{ $errors->has('assembly_name') ? 'is-invalid' : '' }}" type="text" name="assembly_name" id="assembly_name" value="{{ old('assembly_name', $districtposting->assembly_name) }}">
                @if($errors->has('assembly_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('assembly_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.assembly_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="social_division">{{ trans('cruds.districtposting.fields.social_division') }}</label>
                <input class="form-control {{ $errors->has('social_division') ? 'is-invalid' : '' }}" type="text" name="social_division" id="social_division" value="{{ old('social_division', $districtposting->social_division) }}">
                @if($errors->has('social_division'))
                    <div class="invalid-feedback">
                        {{ $errors->first('social_division') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.social_division_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="education">{{ trans('cruds.districtposting.fields.education') }}</label>
                <input class="form-control {{ $errors->has('education') ? 'is-invalid' : '' }}" type="text" name="education" id="education" value="{{ old('education', $districtposting->education) }}">
                @if($errors->has('education'))
                    <div class="invalid-feedback">
                        {{ $errors->first('education') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.education_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profession">{{ trans('cruds.districtposting.fields.profession') }}</label>
                <input class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}" type="text" name="profession" id="profession" value="{{ old('profession', $districtposting->profession) }}">
                @if($errors->has('profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="join_year">{{ trans('cruds.districtposting.fields.join_year') }}</label>
                <input class="form-control {{ $errors->has('join_year') ? 'is-invalid' : '' }}" type="text" name="join_year" id="join_year" value="{{ old('join_year', $districtposting->join_year) }}">
                @if($errors->has('join_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('join_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.join_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gender">{{ trans('cruds.districtposting.fields.gender') }}</label>
                <input class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" type="text" name="gender" id="gender" value="{{ old('gender', $districtposting->gender) }}">
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.districtposting.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $districtposting->dob) }}">
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mother_name">{{ trans('cruds.districtposting.fields.mother_name') }}</label>
                <input class="form-control {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', $districtposting->mother_name) }}">
                @if($errors->has('mother_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.mother_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="father_name">{{ trans('cruds.districtposting.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', $districtposting->father_name) }}">
                @if($errors->has('father_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="marrital_status">{{ trans('cruds.districtposting.fields.marrital_status') }}</label>
                <input class="form-control {{ $errors->has('marrital_status') ? 'is-invalid' : '' }}" type="text" name="marrital_status" id="marrital_status" value="{{ old('marrital_status', $districtposting->marrital_status) }}">
                @if($errors->has('marrital_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marrital_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.marrital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permanent_address">{{ trans('cruds.districtposting.fields.permanent_address') }}</label>
                <textarea class="form-control {{ $errors->has('permanent_address') ? 'is-invalid' : '' }}" name="permanent_address" id="permanent_address">{{ old('permanent_address', $districtposting->permanent_address) }}</textarea>
                @if($errors->has('permanent_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permanent_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.permanent_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="communication_address">{{ trans('cruds.districtposting.fields.communication_address') }}</label>
                <textarea class="form-control {{ $errors->has('communication_address') ? 'is-invalid' : '' }}" name="communication_address" id="communication_address">{{ old('communication_address', $districtposting->communication_address) }}</textarea>
                @if($errors->has('communication_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('communication_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.communication_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile_number">{{ trans('cruds.districtposting.fields.mobile_number') }}</label>
                <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}" type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', $districtposting->mobile_number) }}">
                @if($errors->has('mobile_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.mobile_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_status">{{ trans('cruds.districtposting.fields.payment_status') }}</label>
                <textarea class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status">{{ old('payment_status', $districtposting->payment_status) }}</textarea>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="husband_wife_name">{{ trans('cruds.districtposting.fields.husband_wife_name') }}</label>
                <input class="form-control {{ $errors->has('husband_wife_name') ? 'is-invalid' : '' }}" type="text" name="husband_wife_name" id="husband_wife_name" value="{{ old('husband_wife_name', $districtposting->husband_wife_name) }}">
                @if($errors->has('husband_wife_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('husband_wife_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.husband_wife_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.districtposting.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documentation">{{ trans('cruds.districtposting.fields.documentation') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documentation') ? 'is-invalid' : '' }}" id="documentation-dropzone">
                </div>
                @if($errors->has('documentation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('documentation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.documentation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.districtposting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $districtposting->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('selected') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="selected" value="0">
                    <input class="form-check-input" type="checkbox" name="selected" id="selected" value="1" {{ $districtposting->selected || old('selected', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="selected">{{ trans('cruds.districtposting.fields.selected') }}</label>
                </div>
                @if($errors->has('selected'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selected') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.selected_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="selected_post">{{ trans('cruds.districtposting.fields.selected_post') }}</label>
                {!! Form::select('selected_post', ['மாவட்டச் செயலாளர்' => 'மாவட்டச் செயலாளர்', 'மாவட்டப் பொருளாளர்' => 'மாவட்டப் பொருளாளர்', 'செய்தி தொடர்பாளர்' => 'செய்தி தொடர்பாளர்', 'மாவட்ட துணைச் செயலாளர்' => 'மாவட்ட துணைச் செயலாளர்', 'செயற்குழு உறுப்பினர்' => 'செயற்குழு உறுப்பினர்'], $districtposting->selected_post, ['class' => 'form-control select2', 'placeholder' => 'All']); !!}
                @if($errors->has('selected_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selected_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.selected_post_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo_1">{{ trans('cruds.districtposting.fields.photo_1') }}</label>
                <input class="form-control {{ $errors->has('photo_1') ? 'is-invalid' : '' }}" type="text" name="photo_1" id="photo_1" value="{{ old('photo_1', $districtposting->photo_1) }}">
                @if($errors->has('photo_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.photo_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="receipt_1">{{ trans('cruds.districtposting.fields.receipt_1') }}</label>
                <input class="form-control {{ $errors->has('receipt_1') ? 'is-invalid' : '' }}" type="text" name="receipt_1" id="receipt_1" value="{{ old('receipt_1', $districtposting->receipt_1) }}">
                @if($errors->has('receipt_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receipt_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.receipt_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="receipt_2">{{ trans('cruds.districtposting.fields.receipt_2') }}</label>
                <input class="form-control {{ $errors->has('receipt_2') ? 'is-invalid' : '' }}" type="text" name="receipt_2" id="receipt_2" value="{{ old('receipt_2', $districtposting->receipt_2) }}">
                @if($errors->has('receipt_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receipt_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.receipt_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="receipt_3">{{ trans('cruds.districtposting.fields.receipt_3') }}</label>
                <input class="form-control {{ $errors->has('receipt_3') ? 'is-invalid' : '' }}" type="text" name="receipt_3" id="receipt_3" value="{{ old('receipt_3', $districtposting->receipt_3) }}">
                @if($errors->has('receipt_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receipt_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.receipt_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_1">{{ trans('cruds.districtposting.fields.document_1') }}</label>
                <input class="form-control {{ $errors->has('document_1') ? 'is-invalid' : '' }}" type="text" name="document_1" id="document_1" value="{{ old('document_1', $districtposting->document_1) }}">
                @if($errors->has('document_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_2">{{ trans('cruds.districtposting.fields.document_2') }}</label>
                <input class="form-control {{ $errors->has('document_2') ? 'is-invalid' : '' }}" type="text" name="document_2" id="document_2" value="{{ old('document_2', $districtposting->document_2) }}">
                @if($errors->has('document_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_3">{{ trans('cruds.districtposting.fields.document_3') }}</label>
                <input class="form-control {{ $errors->has('document_3') ? 'is-invalid' : '' }}" type="text" name="document_3" id="document_3" value="{{ old('document_3', $districtposting->document_3) }}">
                @if($errors->has('document_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_4">{{ trans('cruds.districtposting.fields.document_4') }}</label>
                <input class="form-control {{ $errors->has('document_4') ? 'is-invalid' : '' }}" type="text" name="document_4" id="document_4" value="{{ old('document_4', $districtposting->document_4) }}">
                @if($errors->has('document_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_5">{{ trans('cruds.districtposting.fields.document_5') }}</label>
                <input class="form-control {{ $errors->has('document_5') ? 'is-invalid' : '' }}" type="text" name="document_5" id="document_5" value="{{ old('document_5', $districtposting->document_5) }}">
                @if($errors->has('document_5'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_5') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_6">{{ trans('cruds.districtposting.fields.document_6') }}</label>
                <input class="form-control {{ $errors->has('document_6') ? 'is-invalid' : '' }}" type="text" name="document_6" id="document_6" value="{{ old('document_6', $districtposting->document_6) }}">
                @if($errors->has('document_6'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_6') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_6_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_7">{{ trans('cruds.districtposting.fields.document_7') }}</label>
                <input class="form-control {{ $errors->has('document_7') ? 'is-invalid' : '' }}" type="text" name="document_7" id="document_7" value="{{ old('document_7', $districtposting->document_7) }}">
                @if($errors->has('document_7'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_7') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_7_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_8">{{ trans('cruds.districtposting.fields.document_8') }}</label>
                <input class="form-control {{ $errors->has('document_8') ? 'is-invalid' : '' }}" type="text" name="document_8" id="document_8" value="{{ old('document_8', $districtposting->document_8) }}">
                @if($errors->has('document_8'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_8') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_8_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_9">{{ trans('cruds.districtposting.fields.document_9') }}</label>
                <input class="form-control {{ $errors->has('document_9') ? 'is-invalid' : '' }}" type="text" name="document_9" id="document_9" value="{{ old('document_9', $districtposting->document_9) }}">
                @if($errors->has('document_9'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_9') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_9_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="document_10">{{ trans('cruds.districtposting.fields.document_10') }}</label>
                <input class="form-control {{ $errors->has('document_10') ? 'is-invalid' : '' }}" type="text" name="document_10" id="document_10" value="{{ old('document_10', $districtposting->document_10) }}">
                @if($errors->has('document_10'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_10') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.document_10_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.districtposting.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $districtposting->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.districtposting.fields.notes_helper') }}</span>
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
    url: '{{ route('admin.districtpostings.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
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
@if(isset($districtposting) && $districtposting->photo)
      var file = {!! json_encode($districtposting->photo) !!}
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
<script>
    var uploadedDocumentationMap = {}
Dropzone.options.documentationDropzone = {
    url: '{{ route('admin.districtpostings.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="documentation[]" value="' + response.name + '">')
      uploadedDocumentationMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentationMap[file.name]
      }
      $('form').find('input[name="documentation[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($districtposting) && $districtposting->documentation)
          var files =
            {!! json_encode($districtposting->documentation) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="documentation[]" value="' + file.file_name + '">')
            }
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