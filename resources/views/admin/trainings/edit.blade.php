@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.training.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trainings.update", [$training->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.training.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $training->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="district">{{ trans('cruds.training.fields.district') }}</label>
                <input class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" id="district" value="{{ old('district', $training->district) }}" required>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="assembly">{{ trans('cruds.training.fields.assembly') }}</label>
                <input class="form-control {{ $errors->has('assembly') ? 'is-invalid' : '' }}" type="text" name="assembly" id="assembly" value="{{ old('assembly', $training->assembly) }}" required>
                @if($errors->has('assembly'))
                    <div class="invalid-feedback">
                        {{ $errors->first('assembly') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.assembly_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dob">{{ trans('cruds.training.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $training->dob) }}" required>
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father_name">{{ trans('cruds.training.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', $training->father_name) }}" required>
                @if($errors->has('father_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.training.fields.gender') }}</label>
                @foreach(App\Models\Training::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $training->gender) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.training.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $training->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.training.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $training->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.training.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $training->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="whatsapp_number">{{ trans('cruds.training.fields.whatsapp_number') }}</label>
                <input class="form-control {{ $errors->has('whatsapp_number') ? 'is-invalid' : '' }}" type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $training->whatsapp_number) }}" required>
                @if($errors->has('whatsapp_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whatsapp_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.whatsapp_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube_channel">{{ trans('cruds.training.fields.youtube_channel') }}</label>
                <input class="form-control {{ $errors->has('youtube_channel') ? 'is-invalid' : '' }}" type="text" name="youtube_channel" id="youtube_channel" value="{{ old('youtube_channel', $training->youtube_channel) }}">
                @if($errors->has('youtube_channel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube_channel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.youtube_channel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.training.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $training->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.training.fields.interested_in') }}</label>
                <select class="form-control {{ $errors->has('interested_in') ? 'is-invalid' : '' }}" name="interested_in" id="interested_in">
                    <option value disabled {{ old('interested_in', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Training::INTERESTED_IN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('interested_in', $training->interested_in) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('interested_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interested_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.interested_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="education">{{ trans('cruds.training.fields.education') }}</label>
                <input class="form-control {{ $errors->has('education') ? 'is-invalid' : '' }}" type="text" name="education" id="education" value="{{ old('education', $training->education) }}">
                @if($errors->has('education'))
                    <div class="invalid-feedback">
                        {{ $errors->first('education') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.education_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profession">{{ trans('cruds.training.fields.profession') }}</label>
                <input class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}" type="text" name="profession" id="profession" value="{{ old('profession', $training->profession) }}">
                @if($errors->has('profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.training.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address', $training->address) }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.training.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.photo_helper') }}</span>
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
    url: '{{ route('admin.trainings.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
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
@if(isset($training) && $training->photo)
      var file = {!! json_encode($training->photo) !!}
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