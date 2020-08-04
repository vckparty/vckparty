<?php

namespace App\Http\Requests;

use App\Models\SubcategoryPondichery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubcategoryPondicheryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subcategory_pondichery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                  => [
                'string',
                'required',
            ],
            'categorypondichery_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
