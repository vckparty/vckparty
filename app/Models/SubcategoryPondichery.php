<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubcategoryPondichery extends Model
{
    use SoftDeletes;

    public $table = 'subcategory_pondicheries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'categorypondichery_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function categorypondichery()
    {
        return $this->belongsTo(CategoryPondichery::class, 'categorypondichery_id');
    }
}
