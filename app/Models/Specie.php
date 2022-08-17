<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'specie',
        'nursery_id',
        'group_id'
    ];

    public function nursery(): BelongsTo
    {
        return $this->belongsTo( Nursery::class );
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo( Group::class );
    }

}
