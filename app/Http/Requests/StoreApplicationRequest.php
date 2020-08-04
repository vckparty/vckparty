<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApplicationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                  => [
                'string',
                'required',
            ],
            'category_id'           => [
                'required',
                'integer',
            ],
            'subcategory_id'        => [
                'required',
                'integer',
            ],
            'applying_post_id'      => [
                'required',
                'integer',
            ],
            'district_id'           => [
                'required',
                'integer',
            ],
            'assemblys_id'          => [
                'required',
                'integer',
            ],
            'facebook'              => [
                'string',
                'nullable',
            ],
            'twitter'               => [
                'string',
                'nullable',
            ],
            'whatsapp_number'       => [
                'string',
                'nullable',
            ],
            'email'                 => [
                'string',
                'nullable',
            ],
            'youtube_channel'       => [
                'string',
                'nullable',
            ],
            'instagram'             => [
                'string',
                'nullable',
            ],
            'current_post'          => [
                'string',
                'nullable',
            ],
            'gender'                => [
                'required',
            ],
            'dob'                   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'mother'                => [
                'string',
                'required',
            ],
            'father'                => [
                'string',
                'required',
            ],
            'marrital_status'       => [
                'required',
            ],
            'husband_wife_name'     => [
                'string',
                'nullable',
            ],
            'education'             => [
                'string',
                'required',
            ],
            'profession'            => [
                'string',
                'required',
            ],
            'join_date'             => [
                'string',
                'nullable',
            ],
            'permanent_address'     => [
                'required',
            ],
            'communication_address' => [
                'required',
            ],
            'photo'                 => [
                'required',
            ],
            'payment_status'        => [
                'string',
                'required',
            ],
            'payment_receipt.*'     => [
                'required',
            ],
        ];
    }
}
