<?php

namespace App\Http\Requests;

use App\Models\Pondicheryassembly;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePondicheryassemblyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pondicheryassembly_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:pondicheryassemblies,name,' . request()->route('pondicheryassembly')->id,
            ],
        ];
    }
}
