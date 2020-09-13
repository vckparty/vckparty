<?php

namespace App\Http\Requests;

use App\Models\Pondicheryapplication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePondicheryapplicationRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'                  => [
                'string',
                'required',
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
                'required',
            ],
            'email'                 => [
                'string',
                'required',
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
            'payment_status'        => [
                'string',
                'required',
            ],
            'payment_receipt.*'     => [
                'required',
            ],
            'captcha'               => [
                'required',
            ],
        ];
    }
}
