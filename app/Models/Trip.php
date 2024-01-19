<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Wishlist;


class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'start_date',
        'end_date',
        'pickup_location',
        'dropoff_location',
        'price',
        'max_capacity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }
}
