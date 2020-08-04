<?php

namespace App\Http\Requests;

use App\Models\Metropolitan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMetropolitanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('metropolitan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:metropolitans,id',
        ];
    }
}
