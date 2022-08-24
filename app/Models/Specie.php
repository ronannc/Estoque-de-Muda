<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'specie',
        'group_id',
        'type_id',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo( Group::class );
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo( Type::class );
    }

    public function inventories(): HasMany
    {
        return $this->hasMany( Inventory::class );
    }
}
