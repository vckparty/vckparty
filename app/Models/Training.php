<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Training extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'trainings';

    protected $appends = [
        'photo',
    ];

    const GENDER_RADIO = [
        '1' => 'ஆண்',
        '2' => 'பெண்',
    ];

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const INTERESTED_IN_SELECT = [
        '1' => 'Content Writing',
        '2' => 'Text Typing',
        '3' => 'Photo Editing',
        '4' => 'Video Editing',
        '5' => 'Meme Creators',
    ];

    protected $fillable = [
        'name',
        'district',
        'assembly',
        'dob',
        'father_name',
        'gender',
        'email',
        'facebook',
        'twitter',
        'whatsapp_number',
        'youtube_channel',
        'instagram',
        'interested_in',
        'education',
        'profession',
        'address',
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
}
