<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Chat;
use App\Models\NextOfKin;
use App\Models\Toilets;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function chats(): HasMany {
        return $this->hasMany(Chat::class);
    }

    public function wishlists(): HasMany {
        return $this->hasMany(Wishlist::class);
    }

    public function nextOfKin(): HasOne {
        return $this->hasOne(NextOfKin::class);
    }

    public function toilets(): BelongsToMany {
        return $this->belongsToMany(Toilet::class);
    }
}
