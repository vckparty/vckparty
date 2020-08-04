<?php

namespace App\Http\Requests;

use App\Models\Metrovattam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMetrovattamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('metrovattam_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'    => [
                'required',
            ],
            'area_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
