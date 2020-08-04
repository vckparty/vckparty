<?php

namespace App\Http\Requests;

use App\Models\Assembly;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssemblyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('assembly_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:assemblies,name,' . request()->route('assembly')->id,
            ],
        ];
    }
}
