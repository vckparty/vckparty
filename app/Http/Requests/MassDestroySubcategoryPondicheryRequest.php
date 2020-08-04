<?php

namespace App\Http\Requests;

use App\Models\SubcategoryPondichery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubcategoryPondicheryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subcategory_pondichery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:subcategory_pondicheries,id',
        ];
    }
}
