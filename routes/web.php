<?php

use App\Http\Controllers\NasabahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::get('/lab', [NasabahController::class, 'index']);

  Route::get('/nasabah', [NasabahController::class, 'tableNasabah']);
});
