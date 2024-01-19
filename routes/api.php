<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\TripController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




// Authentication Routes
require_once(__DIR__ . '/auth.php');



//Auth Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
Route::prefix('trips')->group(function () {
    Route::get('/', [TripController::class, 'index'])->name('trips.index');
    Route::post('/', [TripController::class, 'store'])->name('trips.store');
});
