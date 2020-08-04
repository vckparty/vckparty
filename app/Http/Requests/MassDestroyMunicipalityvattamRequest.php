<?php

namespace App\Http\Requests;

use App\Models\Municipalityvattam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMunicipalityvattamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('municipalityvattam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:municipalityvattams,id',
        ];
    }
}
