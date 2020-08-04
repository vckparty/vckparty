<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    public $table = 'areas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'metropolitan_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function metropolitan()
    {
        return $this->belongsTo(Metropolitan::class, 'metropolitan_id');
    }
}
