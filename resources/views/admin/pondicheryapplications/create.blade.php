@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pondicheryapplication.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pondicheryapplications.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.pondicheryapplication.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categorypondichery_id">{{ trans('cruds.pondicheryapplication.fields.categorypondichery') }}</label>
                <select class="form-control select2 {{ $errors->has('categorypondichery') ? 'is-invalid' : '' }}" name="categorypondichery_id" id="categorypondichery_id">
                    @foreach($categorypondicheries as $id => $categorypondichery)
                        <option value="{{ $id }}" {{ old('categorypondichery_id') == $id ? 'selected' : '' }}>{{ $categorypondichery }}</option>
                    @endforeach
                </select>
                @if($errors->has('categorypondichery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categorypondichery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.categorypondichery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subcategorypondichery_id">{{ trans('cruds.pondicheryapplication.fields.subcategorypondichery') }}</label>
                <select class="form-control select2 {{ $errors->has('subcategorypondichery') ? 'is-invalid' : '' }}" name="subcategorypondichery_id" id="subcategorypondichery_id">
                    @foreach($subcategorypondicheries as $id => $subcategorypondichery)
                        <option value="{{ $id }}" {{ old('subcategorypondichery_id') == $id ? 'selected' : '' }}>{{ $subcategorypondichery }}</option>
                    @endforeach
                </select>
                @if($errors->has('subcategorypondichery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subcategorypondichery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.subcategorypondichery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subsubcategory_id">{{ trans('cruds.pondicheryapplication.fields.subsubcategory') }}</label>
                <select class="form-control select2 {{ $errors->has('subsubcategory') ? 'is-invalid' : '' }}" name="subsubcategory_id" id="subsubcategory_id">
                    @foreach($subsubcategories as $id => $subsubcategory)
                        <option value="{{ $id }}" {{ old('subsubcategory_id') == $id ? 'selected' : '' }}>{{ $subsubcategory }}</option>
                    @endforeach
                </select>
                @if($errors->has('subsubcategory'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subsubcategory') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.subsubcategory_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="districtspondichery_id">{{ trans('cruds.pondicheryapplication.fields.districtspondichery') }}</label>
                <select class="form-control select2 {{ $errors->has('districtspondichery') ? 'is-invalid' : '' }}" name="districtspondichery_id" id="districtspondichery_id">
                    @foreach($districtspondicheries as $id => $districtspondichery)
                        <option value="{{ $id }}" {{ old('districtspondichery_id') == $id ? 'selected' : '' }}>{{ $districtspondichery }}</option>
                    @endforeach
                </select>
                @if($errors->has('districtspondichery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('districtspondichery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.districtspondichery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pondicheryassemblys_id">{{ trans('cruds.pondicheryapplication.fields.pondicheryassemblys') }}</label>
                <select class="form-control select2 {{ $errors->has('pondicheryassemblys') ? 'is-invalid' : '' }}" name="pondicheryassemblys_id" id="pondicheryassemblys_id">
                    @foreach($pondicheryassemblys as $id => $pondicheryassemblys)
                        <option value="{{ $id }}" {{ old('pondicheryassemblys_id') == $id ? 'selected' : '' }}>{{ $pondicheryassemblys }}</option>
                    @endforeach
                </select>
                @if($errors->has('pondicheryassemblys'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pondicheryassemblys') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.pondicheryassemblys_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pondicheryapplication.fields.social_medias') }}</label>
                @foreach(App\Models\Pondicheryapplication::SOCIAL_MEDIAS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('social_medias') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="social_medias_{{ $key }}" name="social_medias" value="{{ $key }}" {{ old('social_medias', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="social_medias_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('social_medias'))
                    <div class="invalid-feedback">
                        {{ $errors->first('social_medias') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.social_medias_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.pondicheryapplication.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.pondicheryapplication.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="whatsapp_number">{{ trans('cruds.pondicheryapplication.fields.whatsapp_number') }}</label>
                <input class="form-control {{ $errors->has('whatsapp_number') ? 'is-invalid' : '' }}" type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', '') }}">
                @if($errors->has('whatsapp_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whatsapp_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.whatsapp_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.pondicheryapplication.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube_channel">{{ trans('cruds.pondicheryapplication.fields.youtube_channel') }}</label>
                <input class="form-control {{ $errors->has('youtube_channel') ? 'is-invalid' : '' }}" type="text" name="youtube_channel" id="youtube_channel" value="{{ old('youtube_channel', '') }}">
                @if($errors->has('youtube_channel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube_channel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.youtube_channel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.pondicheryapplication.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="current_post">{{ trans('cruds.pondicheryapplication.fields.current_post') }}</label>
                <input class="form-control {{ $errors->has('current_post') ? 'is-invalid' : '' }}" type="text" name="current_post" id="current_post" value="{{ old('current_post', '') }}">
                @if($errors->has('current_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.current_post_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.pondicheryapplication.fields.gender') }}</label>
                @foreach(App\Models\Pondicheryapplication::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dob">{{ trans('cruds.pondicheryapplication.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}" required>
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mother">{{ trans('cruds.pondicheryapplication.fields.mother') }}</label>
                <input class="form-control {{ $errors->has('mother') ? 'is-invalid' : '' }}" type="text" name="mother" id="mother" value="{{ old('mother', '') }}" required>
                @if($errors->has('mother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father">{{ trans('cruds.pondicheryapplication.fields.father') }}</label>
                <input class="form-control {{ $errors->has('father') ? 'is-invalid' : '' }}" type="text" name="father" id="father" value="{{ old('father', '') }}" required>
                @if($errors->has('father'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.father_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.pondicheryapplication.fields.marrital_status') }}</label>
                @foreach(App\Models\Pondicheryapplication::MARRITAL_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('marrital_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="marrital_status_{{ $key }}" name="marrital_status" value="{{ $key }}" {{ old('marrital_status', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="marrital_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('marrital_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marrital_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.marrital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="husband_wife_name">{{ trans('cruds.pondicheryapplication.fields.husband_wife_name') }}</label>
                <input class="form-control {{ $errors->has('husband_wife_name') ? 'is-invalid' : '' }}" type="text" name="husband_wife_name" id="husband_wife_name" value="{{ old('husband_wife_name', '') }}">
                @if($errors->has('husband_wife_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('husband_wife_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.husband_wife_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="education">{{ trans('cruds.pondicheryapplication.fields.education') }}</label>
                <input class="form-control {{ $errors->has('education') ? 'is-invalid' : '' }}" type="text" name="education" id="education" value="{{ old('education', '') }}" required>
                @if($errors->has('education'))
                    <div class="invalid-feedback">
                        {{ $errors->first('education') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.education_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="profession">{{ trans('cruds.pondicheryapplication.fields.profession') }}</label>
                <input class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}" type="text" name="profession" id="profession" value="{{ old('profession', '') }}" required>
                @if($errors->has('profession'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profession') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="join_date">{{ trans('cruds.pondicheryapplication.fields.join_date') }}</label>
                <input class="form-control {{ $errors->has('join_date') ? 'is-invalid' : '' }}" type="text" name="join_date" id="join_date" value="{{ old('join_date', '') }}">
                @if($errors->has('join_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('join_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.join_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permanent_address">{{ trans('cruds.pondicheryapplication.fields.permanent_address') }}</label>
                <textarea class="form-control {{ $errors->has('permanent_address') ? 'is-invalid' : '' }}" name="permanent_address" id="permanent_address" required>{{ old('permanent_address') }}</textarea>
                @if($errors->has('permanent_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permanent_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.permanent_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="communication_address">{{ trans('cruds.pondicheryapplication.fields.communication_address') }}</label>
                <textarea class="form-control {{ $errors->has('communication_address') ? 'is-invalid' : '' }}" name="communication_address" id="communication_address" required>{{ old('communication_address') }}</textarea>
                @if($errors->has('communication_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('communication_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.communication_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pondicheryapplication.fields.social_category') }}</label>
                @foreach(App\Models\Pondicheryapplication::SOCIAL_CATEGORY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('social_category') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="social_category_{{ $key }}" name="social_category" value="{{ $key }}" {{ old('social_category', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="social_category_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('social_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('social_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.social_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.pondicheryapplication.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.pondicheryapplication.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_status">{{ trans('cruds.pondicheryapplication.fields.payment_status') }}</label>
                <input class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" type="text" name="payment_status" id="payment_status" value="{{ old('payment_status', '') }}" required>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_receipt">{{ trans('cruds.pondicheryapplication.fields.payment_receipt') }}</label>
                <div class="needsclick dropzone {{ $errors->has('payment_receipt') ? 'is-invalid' : '' }}" id="payment_receipt-dropzone">
                </div>
                @if($errors->has('payment_receipt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_receipt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.payment_receipt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documents">{{ trans('cruds.pondicheryapplication.fields.documents') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documents') ? 'is-invalid' : '' }}" id="documents-dropzone">
                </div>
                @if($errors->has('documents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('documents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pondicheryapplication.fields.documents_helper') }}</span>
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
    url: '{{ route('admin.pondicheryapplications.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 1024,
      height: 1025
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
@if(isset($pondicheryapplication) && $pondicheryapplication->photo)
      var file = {!! json_encode($pondicheryapplication->photo) !!}
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
    var uploadedPaymentReceiptMap = {}
Dropzone.options.paymentReceiptDropzone = {
    url: '{{ route('admin.pondicheryapplications.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="payment_receipt[]" value="' + response.name + '">')
      uploadedPaymentReceiptMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPaymentReceiptMap[file.name]
      }
      $('form').find('input[name="payment_receipt[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($pondicheryapplication) && $pondicheryapplication->payment_receipt)
          var files =
            {!! json_encode($pondicheryapplication->payment_receipt) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="payment_receipt[]" value="' + file.file_name + '">')
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
<script>
    var uploadedDocumentsMap = {}
Dropzone.options.documentsDropzone = {
    url: '{{ route('admin.pondicheryapplications.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="documents[]" value="' + response.name + '">')
      uploadedDocumentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentsMap[file.name]
      }
      $('form').find('input[name="documents[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($pondicheryapplication) && $pondicheryapplication->documents)
          var files =
            {!! json_encode($pondicheryapplication->documents) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="documents[]" value="' + file.file_name + '">')
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