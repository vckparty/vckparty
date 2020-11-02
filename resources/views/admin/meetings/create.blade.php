@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.meeting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.meetings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.meeting.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father_name">{{ trans('cruds.meeting.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', '') }}" required>
                @if($errors->has('father_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="educational_qualification">{{ trans('cruds.meeting.fields.educational_qualification') }}</label>
                <input class="form-control {{ $errors->has('educational_qualification') ? 'is-invalid' : '' }}" type="text" name="educational_qualification" id="educational_qualification" value="{{ old('educational_qualification', '') }}" required>
                @if($errors->has('educational_qualification'))
                    <div class="invalid-feedback">
                        {{ $errors->first('educational_qualification') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.educational_qualification_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.meeting.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="block_area_town_vattam">{{ trans('cruds.meeting.fields.block_area_town_vattam') }}</label>
                <input class="form-control {{ $errors->has('block_area_town_vattam') ? 'is-invalid' : '' }}" type="text" name="block_area_town_vattam" id="block_area_town_vattam" value="{{ old('block_area_town_vattam', '') }}" required>
                @if($errors->has('block_area_town_vattam'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_area_town_vattam') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.block_area_town_vattam_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="district">{{ trans('cruds.meeting.fields.district') }}</label>
                <input class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" id="district" value="{{ old('district', '') }}" required>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="state">{{ trans('cruds.meeting.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}" required>
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country">{{ trans('cruds.meeting.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}" required>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="current_post">{{ trans('cruds.meeting.fields.current_post') }}</label>
                <input class="form-control {{ $errors->has('current_post') ? 'is-invalid' : '' }}" type="text" name="current_post" id="current_post" value="{{ old('current_post', '') }}">
                @if($errors->has('current_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.current_post_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profession">{{ trans('cruds.meeting.fields.profession') }}</label>
                <input class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}" type="text" name="profession" id="profession" value="{{ old('profession', '') }}">
                @if($errors->has('profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.meeting.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.meeting.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="whatsapp_number">{{ trans('cruds.meeting.fields.whatsapp_number') }}</label>
                <input class="form-control {{ $errors->has('whatsapp_number') ? 'is-invalid' : '' }}" type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', '') }}" required>
                @if($errors->has('whatsapp_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whatsapp_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.whatsapp_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.meeting.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.instagram_helper') }}</span>
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
    url: '{{ route('admin.meetings.storeMedia') }}',
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
@if(isset($meeting) && $meeting->photo)
      var file = {!! json_encode($meeting->photo) !!}
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