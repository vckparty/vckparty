<?php

namespace App\Http\Requests;

use App\Models\Districtspondichery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDistrictspondicheryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('districtspondichery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:districtspondicheries,name,' . request()->route('districtspondichery')->id,
            ],
        ];
    }
}
