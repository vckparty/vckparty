<?php

namespace App\Http\Requests;

use App\Models\Townpanchayat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTownpanchayatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('townpanchayat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
            ],
            'district_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
