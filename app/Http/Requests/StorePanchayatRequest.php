<?php

namespace App\Http\Requests;

use App\Models\Panchayat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePanchayatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('panchayat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'     => [
                'required',
            ],
            'block_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
