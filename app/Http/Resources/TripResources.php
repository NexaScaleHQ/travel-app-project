<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Trip */

class TripResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'trip_description' => $this->trip_description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'pickup_location' => $this->pickup_location,
            'dropoff_location' => $this->dropoff_location,
            'price' => $this->price,
            'max_capacity' => $this->max_capacity,

        ];
    }
}
