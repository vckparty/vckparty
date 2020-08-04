<?php

namespace App\Http\Requests;

use App\Models\Assembly;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssemblyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('assembly_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:assemblies,id',
        ];
    }
}
