@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.townvattam.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.townvattams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.townvattam.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.townvattam.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="townpanchayat_id">{{ trans('cruds.townvattam.fields.townpanchayat') }}</label>
                <select class="form-control select2 {{ $errors->has('townpanchayat') ? 'is-invalid' : '' }}" name="townpanchayat_id" id="townpanchayat_id" required>
                    @foreach($townpanchayats as $id => $townpanchayat)
                        <option value="{{ $id }}" {{ old('townpanchayat_id') == $id ? 'selected' : '' }}>{{ $townpanchayat }}</option>
                    @endforeach
                </select>
                @if($errors->has('townpanchayat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('townpanchayat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.townvattam.fields.townpanchayat_helper') }}</span>
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