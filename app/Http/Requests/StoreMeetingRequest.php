<?php

namespace App\Http\Requests;

use App\Models\Meeting;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMeetingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'                      => [
                'string',
                'required',
            ],
            'father_name'               => [
                'string',
                'required',
            ],
            'educational_qualification' => [
                'string',
                'required',
            ],
            'photo'                     => [
                'required',
            ],
            'block_area_town_vattam'    => [
                'string',
                'required',
            ],
            'district'                  => [
                'string',
                'required',
            ],
            'state'                     => [
                'string',
                'required',
            ],
            'country'                   => [
                'string',
                'required',
            ],
            'current_post'              => [
                'string',
                'nullable',
            ],
            'profession'                => [
                'string',
                'nullable',
            ],
            'twitter'                   => [
                'string',
                'nullable',
            ],
            'facebook'                  => [
                'string',
                'nullable',
            ],
            'whatsapp_number'           => [
                'string',
                'required',
            ],
            'instagram'                 => [
                'string',
                'nullable',
            ],
        ];
    }
}
