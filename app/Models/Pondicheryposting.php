<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Pondicheryposting extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $appends = [
        'photo',
    ];

    public $table = 'pondicherypostings';

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const MARRITAL_STATUS_RADIO = [
        'ஆம்'   => 'ஆம்',
        'இல்லை' => 'இல்லை',
    ];

    const GENDER_RADIO = [
        'ஆண்'    => 'ஆண்',
        'பெண்'   => 'பெண்',
        'மற்றவை' => 'மற்றவை',
    ];

    const SOCIAL_CATEGORY_RADIO = [
        'பிற்படுத்தப்பட்டவர் (BC/MBC)' => 'பிற்படுத்தப்பட்டவர் (BC/MBC)',
        'முன்னேறிய வகுப்பினர் (FC)'    => 'முன்னேறிய வகுப்பினர் (FC)',
        'பழங்குடியினர்'                => 'பழங்குடியினர்',
        'இசுலாமியர்'                   => 'இசுலாமியர்',
        'கிறித்தவர்'                   => 'கிறித்தவர்',
    ];

    protected $fillable = [
        'name',
        'categorypondichery_id',
        'subcategorypondichery_id',
        'subsubcategory_id',
        'districtspondichery_id',
        'pondicheryassembly_id',
        'facebook',
        'twitter',
        'whatsapp_number',
        'email',
        'youtube_channel',
        'instagram',
        'gender',
        'blood_group',
        'dob',
        'mother',
        'father',
        'marrital_status',
        'husband_wife_name',
        'education',
        'profession',
        'join_date',
        'permanent_address',
        'communication_address',
        'social_category',
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

    public function categorypondichery()
    {
        return $this->belongsTo(CategoryPondichery::class, 'categorypondichery_id');
    }

    public function subcategorypondichery()
    {
        return $this->belongsTo(SubcategoryPondichery::class, 'subcategorypondichery_id');
    }

    public function subsubcategory()
    {
        return $this->belongsTo(Subsubcategory::class, 'subsubcategory_id');
    }

    public function districtspondichery()
    {
        return $this->belongsTo(Districtspondichery::class, 'districtspondichery_id');
    }

    public function pondicheryassembly()
    {
        return $this->belongsTo(Pondicheryassembly::class, 'pondicheryassembly_id');
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
