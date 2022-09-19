<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STORE = 1;
    const EXIT  = 2;

    protected $fillable = [
        'quantity',
        'type',
        'specie_id',
        'nursery_id',
        'type_id',
        'date',
        'observation',
        'responsible',
        'destiny'
    ];

    public function specie(): BelongsTo
    {
        return $this->belongsTo( Specie::class );
    }

    public function nursery(): BelongsTo
    {
        return $this->belongsTo( Nursery::class );
    }

    public function type_size(): BelongsTo
    {
        return $this->belongsTo( Type::class, 'type_id' );
    }
}
