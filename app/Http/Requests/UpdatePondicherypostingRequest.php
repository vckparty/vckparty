<?php

namespace App\Http\Requests;

use App\Models\Pondicheryposting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePondicherypostingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pondicheryposting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                   => [
                'string',
                'required',
            ],
            'districtspondichery_id' => [
                'required',
                'integer',
            ],
            'facebook'               => [
                'string',
                'nullable',
            ],
            'twitter'                => [
                'string',
                'nullable',
            ],
            'whatsapp_number'        => [
                'string',
                'nullable',
            ],
            'email'                  => [
                'string',
                'nullable',
            ],
            'youtube_channel'        => [
                'string',
                'nullable',
            ],
            'instagram'              => [
                'string',
                'nullable',
            ],
            'gender'                 => [
                'required',
            ],
            'blood_group'            => [
                'string',
                'nullable',
            ],
            'dob'                    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'mother'                 => [
                'string',
                'required',
            ],
            'father'                 => [
                'string',
                'required',
            ],
            'marrital_status'        => [
                'required',
            ],
            'husband_wife_name'      => [
                'string',
                'nullable',
            ],
            'education'              => [
                'string',
                'required',
            ],
            'profession'             => [
                'string',
                'required',
            ],
            'join_date'              => [
                'string',
                'nullable',
            ],
            'permanent_address'      => [
                'required',
            ],
            'communication_address'  => [
                'required',
            ],
        ];
    }
}
