<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'place_id',
        'name',
        'description',
        'price',
        'duration',
    ];

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
}