<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::name('api.')->group(function () {
    Route::apiResource('registry', APIController::class);

    Route::controller(APIController::class)->group(function () {
        Route::get('/{registry}', 'show')->name('registry.show');
        Route::put('/{registry}', 'update')->name('registry.update');
    });
});
