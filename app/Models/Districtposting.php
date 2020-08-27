<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Districtposting extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'districtpostings';

     protected $selected_option = [
    'selected' => 'boolean',
    ];
    
    protected $appends = [
        'photo',
        'documentation',
    ];

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'applied_post',
        'current_post',
        'district',
        'assembly_name',
        'social_division',
        'education',
        'profession',
        'join_year',
        'gender',
        'dob',
        'mother_name',
        'father_name',
        'marrital_status',
        'permanent_address',
        'communication_address',
        'mobile_number',
        'payment_status',
        'husband_wife_name',
        'email',
        'selected',
        'selected_post',
        'photo_1',
        'receipt_1',
        'receipt_2',
        'receipt_3',
        'document_1',
        'document_2',
        'document_3',
        'document_4',
        'document_5',
        'document_6',
        'document_7',
        'document_8',
        'document_9',
        'document_10',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

   

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getDocumentationAttribute()
    {
        return $this->getMedia('documentation');
    }
}
