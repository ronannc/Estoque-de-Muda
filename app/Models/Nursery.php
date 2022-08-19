<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nursery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'city_id',
        'address',
        'neighborhood',
        'number'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo( City::class );
    }
}
