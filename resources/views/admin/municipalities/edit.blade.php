@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.municipality.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.municipalities.update", [$municipality->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.municipality.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $municipality->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipality.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="district_id">{{ trans('cruds.municipality.fields.district') }}</label>
                <select class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district_id" id="district_id" required>
                    @foreach($districts as $id => $district)
                        <option value="{{ $id }}" {{ ($municipality->district ? $municipality->district->id : old('district_id')) == $id ? 'selected' : '' }}>{{ $district }}</option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.municipality.fields.district_helper') }}</span>
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