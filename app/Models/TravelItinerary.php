<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelItinerary extends Model
{
    use HasFactory;

    public function user(): BelongsTo {
        $this->belongsTo(User::class);
    }
    
}
