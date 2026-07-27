<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'address',
        'phone',
        'open_time',
        'close_time',
        'image',
        'status',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings(): HasMany
{
    return $this->hasMany(Booking::class);
}

public function services(): HasMany
{
    return $this->hasMany(Service::class);
}

}