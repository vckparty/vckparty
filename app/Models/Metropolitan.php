<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metropolitan extends Model
{
    use SoftDeletes;

    public $table = 'metropolitans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'district_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
