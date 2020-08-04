<?php

namespace App\Http\Requests;

use App\Models\CategoryPondichery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCategoryPondicheryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('category_pondichery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
