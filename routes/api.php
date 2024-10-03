<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// هنا يمكنك تعريف المسارات الخاصة بـ API
use App\Http\Controllers\PropertyController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('properties', [PropertyController::class, 'index']);
    Route::post('properties', [PropertyController::class, 'store']);
    Route::get('properties/{id}', [PropertyController::class, 'show']);
    Route::put('properties/{id}', [PropertyController::class, 'update']);
    Route::delete('properties/{id}', [PropertyController::class, 'destroy']);
});
