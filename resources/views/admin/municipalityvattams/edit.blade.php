@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.municipalityvattam.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.municipalityvattams.update", [$municipalityvattam->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.municipalityvattam.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $municipalityvattam->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipalityvattam.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="municipality_id">{{ trans('cruds.municipalityvattam.fields.municipality') }}</label>
                <select class="form-control select2 {{ $errors->has('municipality') ? 'is-invalid' : '' }}" name="municipality_id" id="municipality_id" required>
                    @foreach($municipalities as $id => $municipality)
                        <option value="{{ $id }}" {{ ($municipalityvattam->municipality ? $municipalityvattam->municipality->id : old('municipality_id')) == $id ? 'selected' : '' }}>{{ $municipality }}</option>
                    @endforeach
                </select>
                @if($errors->has('municipality'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municipality') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipalityvattam.fields.municipality_helper') }}</span>
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