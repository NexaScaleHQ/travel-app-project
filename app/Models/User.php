<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function hotels() {
        return $this->belongsToMany(Hotel::class);
    }

    public function restaurants() {
        return $this->hasMany(Restaurant::class);
    }

    public function trips() {
        return $this->hasMany(Trip::class);
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function savedLocations(): HasMany {
        return $this->hasMany(SavedLocation::class);
    }

    public function locations(): HasMany {
        return $this->hasMany(Location::class);
    }

    public function travelItineraries(): HasMany {
        return $this->hasMany(TravelItinerary::class);
    }
}
