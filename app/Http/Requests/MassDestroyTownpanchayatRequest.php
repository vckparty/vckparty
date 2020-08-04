<?php

namespace App\Http\Requests;

use App\Models\Townpanchayat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTownpanchayatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('townpanchayat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:townpanchayats,id',
        ];
    }
}
