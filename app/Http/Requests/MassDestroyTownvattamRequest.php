<?php

namespace App\Http\Requests;

use App\Models\Townvattam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTownvattamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('townvattam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:townvattams,id',
        ];
    }
}
