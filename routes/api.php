<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::apiResource('registry', APIController::class);

    Route::controller(APIController::class)->group(function () {
        Route::get('/{registry}', 'show')->name('registry.show');
        Route::put('/{registry}', 'update')->name('registry.update');
    });
});
