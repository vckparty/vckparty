<?php

namespace App\Http\Requests;

use App\Models\Municipalityvattam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateMunicipalityvattamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('municipalityvattam_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'municipality_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
