<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Townvattam extends Model
{
    use SoftDeletes;

    public $table = 'townvattams';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'townpanchayat_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function townpanchayat()
    {
        return $this->belongsTo(Townpanchayat::class, 'townpanchayat_id');
    }
}
