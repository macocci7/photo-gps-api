<?php

use App\Http\Controllers\Api\PhotoGpsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['throttle:api_files'])->group(function () {
    Route::get('/files', [PhotoGpsController::class, 'files'])->name('api.files');
    Route::post('/files', [PhotoGpsController::class, 'files'])->name('api.files');
});
Route::middleware(['throttle:api_upload'])->group(function () {
    Route::post('/upload', [PhotoGpsController::class, 'upload'])->name('api.upload');
});
