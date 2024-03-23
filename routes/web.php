<?php

use App\Http\Controllers\NasabahController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
  return view('welcome');
});*/

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::get('/', [NasabahController::class, 'index'])
    ->name('nasabah.index');
  Route::get('/nasabah/{NasabahId}', [NasabahController::class, 'show'])
    ->name('nasabah.show');
  Route::get('/nasabah/update', [NasabahController::class, 'filteredData'])
    ->name('nasabah.update');

  Route::get('/nasabah', [NasabahController::class, 'tableNasabah']);
});
