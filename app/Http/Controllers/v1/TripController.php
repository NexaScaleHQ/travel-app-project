<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateTrip;
use App\Http\Resources\TripResources;
use Illuminate\Http\Request;

class TripController extends Controller
{
    //
    public function index(): JsonResponse
    {   
        $trips = Trip::all();

        return response()->json([
            'message' => 'Trip Controller',
            'data' => $trips,
        ], 200);
    }

    public function store(CreateTrip $request): JsonResponse
    {
        $data = $request->validated();

        $trip = Trip::create(array_merge($data, [
            'user_id' => auth()->user()->id,
        ]));

        return response()->json([
            'message' => 'Trip Created Successfully',
            'data' => new TripResources($trip),
        ], 201);
    }
}
