@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subsubcategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subsubcategories.update", [$subsubcategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.subsubcategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $subsubcategory->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subsubcategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subcategorypondichery_id">{{ trans('cruds.subsubcategory.fields.subcategorypondichery') }}</label>
                <select class="form-control select2 {{ $errors->has('subcategorypondichery') ? 'is-invalid' : '' }}" name="subcategorypondichery_id" id="subcategorypondichery_id" required>
                    @foreach($subcategorypondicheries as $id => $subcategorypondichery)
                        <option value="{{ $id }}" {{ ($subsubcategory->subcategorypondichery ? $subsubcategory->subcategorypondichery->id : old('subcategorypondichery_id')) == $id ? 'selected' : '' }}>{{ $subcategorypondichery }}</option>
                    @endforeach
                </select>
                @if($errors->has('subcategorypondichery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subcategorypondichery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subsubcategory.fields.subcategorypondichery_helper') }}</span>
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