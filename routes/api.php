<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\V1\DocumentsAPIController;
use App\Http\Controllers\V1\NasabahAPIController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResources([
        'nasabahAPI' => NasabahAPIController::class,
        'documents' => DocumentsAPIController::class,
    ]);
//  Route::apiResource('nasabahAPI', NasabahAPIController::class);
//  Route::apiResource('documentsAPI', DocumentsAPIController::class);
});
