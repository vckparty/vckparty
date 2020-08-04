<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subsubcategory extends Model
{
    use SoftDeletes;

    public $table = 'subsubcategories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'subcategorypondichery_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subcategorypondichery()
    {
        return $this->belongsTo(SubcategoryPondichery::class, 'subcategorypondichery_id');
    }
}
