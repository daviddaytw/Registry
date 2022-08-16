<?php

use App\Http\Controllers\RegistryController;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('dashboard');
    } else {
        return view('welcome');
    }
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect(route('registry.index'));
    })->name('dashboard');

    Route::resource('registry', RegistryController::class);
});

Route::resource('registry', RegistryController::class)->only(['store', 'show']);
