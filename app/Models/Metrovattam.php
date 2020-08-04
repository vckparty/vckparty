<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metrovattam extends Model
{
    use SoftDeletes;

    public $table = 'metrovattams';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'area_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
