<?php

use App\Http\Controllers\NasabahController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
});

Route::get('/', [NasabahController::class, 'index'])
  ->name('nasabah.index');
Route::get('/nasabah/{NasabahId}', [NasabahController::class, 'show'])
  ->name('nasabah.show');
Route::get('/nasabah/update', [NasabahController::class, 'filteredData'])
  ->name('nasabah.update');
Route::get('/nasabah', [NasabahController::class, 'tableNasabah']);

Route::get('/setup', function () {
  $credential = [
    'email' => 'admin@admin.com',
    'password' => 'password',
  ];

  if (!Auth::attempt($credential)) {
    $user = new User();

    $user->name = 'admin';
    $user->email = 'admin@admin.com';
    $user->password = Hash::make('password');
    $user->save();

    if (Auth::attempt($credential)) {
      $user = Auth::user();

      $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
      $updateToken = $user->createToken('update-token', ['create', 'update']);
      $basicToken = $user->createToken('basic-token');

      return [
        'admin' => $adminToken->plainTextToken,
        'update' => $updateToken->plainTextToken,
        'basic' => $basicToken->plainTextToken,
      ];
    }
  }
});
