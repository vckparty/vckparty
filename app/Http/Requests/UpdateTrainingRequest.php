<?php

namespace App\Http\Requests;

use App\Models\Training;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTrainingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('training_edit');
    }

    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
            ],
            'district'        => [
                'string',
                'required',
            ],
            'assembly'        => [
                'string',
                'required',
            ],
            'dob'             => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'father_name'     => [
                'string',
                'required',
            ],
            'gender'          => [
                'required',
            ],
            'email'           => [
                'string',
                'required',
            ],
            'facebook'        => [
                'string',
                'nullable',
            ],
            'twitter'         => [
                'string',
                'nullable',
            ],
            'whatsapp_number' => [
                'string',
                'required',
            ],
            'youtube_channel' => [
                'string',
                'nullable',
            ],
            'instagram'       => [
                'string',
                'nullable',
            ],
            'education'       => [
                'string',
                'nullable',
            ],
            'profession'      => [
                'string',
                'nullable',
            ],
            'address'         => [
                'required',
            ],
        ];
    }
}
