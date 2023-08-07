<?php

use App\Http\Controllers\v1\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Authentication Routes
|--------------------------------------------------------------------------|
*/


Route::prefix('v1/auth')->group(function(){
    Route::post('login', [LoginController::class, 'login']);
});

