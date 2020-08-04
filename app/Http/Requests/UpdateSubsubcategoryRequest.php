<?php

namespace App\Http\Requests;

use App\Models\Subsubcategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubsubcategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subsubcategory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                     => [
                'string',
                'required',
            ],
            'subcategorypondichery_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
