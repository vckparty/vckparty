@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.area.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.areas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.area.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.area.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="metropolitan_id">{{ trans('cruds.area.fields.metropolitan') }}</label>
                <select class="form-control select2 {{ $errors->has('metropolitan') ? 'is-invalid' : '' }}" name="metropolitan_id" id="metropolitan_id" required>
                    @foreach($metropolitans as $id => $metropolitan)
                        <option value="{{ $id }}" {{ old('metropolitan_id') == $id ? 'selected' : '' }}>{{ $metropolitan }}</option>
                    @endforeach
                </select>
                @if($errors->has('metropolitan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('metropolitan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.area.fields.metropolitan_helper') }}</span>
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