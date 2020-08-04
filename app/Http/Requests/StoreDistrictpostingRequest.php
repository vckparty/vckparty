<?php

namespace App\Http\Requests;

use App\Models\Districtposting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDistrictpostingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('districtposting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'              => [
                'string',
                'nullable',
            ],
            'applied_post'      => [
                'string',
                'nullable',
            ],
            'current_post'      => [
                'string',
                'nullable',
            ],
            'district'          => [
                'string',
                'nullable',
            ],
            'assembly_name'     => [
                'string',
                'nullable',
            ],
            'social_division'   => [
                'string',
                'nullable',
            ],
            'education'         => [
                'string',
                'nullable',
            ],
            'profession'        => [
                'string',
                'nullable',
            ],
            'join_year'         => [
                'string',
                'nullable',
            ],
            'gender'            => [
                'string',
                'nullable',
            ],
            'dob'               => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'mother_name'       => [
                'string',
                'nullable',
            ],
            'father_name'       => [
                'string',
                'nullable',
            ],
            'marrital_status'   => [
                'string',
                'nullable',
            ],
            'mobile_number'     => [
                'string',
                'nullable',
            ],
            'husband_wife_name' => [
                'string',
                'nullable',
            ],
            'selected_post'     => [
                'string',
                'nullable',
            ],
            'photo_1'           => [
                'string',
                'nullable',
            ],
            'receipt_1'         => [
                'string',
                'nullable',
            ],
            'receipt_2'         => [
                'string',
                'nullable',
            ],
            'receipt_3'         => [
                'string',
                'nullable',
            ],
            'document_1'        => [
                'string',
                'nullable',
            ],
            'document_2'        => [
                'string',
                'nullable',
            ],
            'document_3'        => [
                'string',
                'nullable',
            ],
            'document_4'        => [
                'string',
                'nullable',
            ],
            'document_5'        => [
                'string',
                'nullable',
            ],
            'document_6'        => [
                'string',
                'nullable',
            ],
            'document_7'        => [
                'string',
                'nullable',
            ],
            'document_8'        => [
                'string',
                'nullable',
            ],
            'document_9'        => [
                'string',
                'nullable',
            ],
            'document_10'       => [
                'string',
                'nullable',
            ],
        ];
    }
}
