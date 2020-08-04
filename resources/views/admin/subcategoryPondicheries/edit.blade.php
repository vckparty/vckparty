@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subcategoryPondichery.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subcategory-pondicheries.update", [$subcategoryPondichery->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.subcategoryPondichery.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $subcategoryPondichery->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subcategoryPondichery.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categorypondichery_id">{{ trans('cruds.subcategoryPondichery.fields.categorypondichery') }}</label>
                <select class="form-control select2 {{ $errors->has('categorypondichery') ? 'is-invalid' : '' }}" name="categorypondichery_id" id="categorypondichery_id" required>
                    @foreach($categorypondicheries as $id => $categorypondichery)
                        <option value="{{ $id }}" {{ ($subcategoryPondichery->categorypondichery ? $subcategoryPondichery->categorypondichery->id : old('categorypondichery_id')) == $id ? 'selected' : '' }}>{{ $categorypondichery }}</option>
                    @endforeach
                </select>
                @if($errors->has('categorypondichery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categorypondichery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subcategoryPondichery.fields.categorypondichery_helper') }}</span>
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