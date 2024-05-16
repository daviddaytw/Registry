<?php

use App\Http\Controllers\RegistryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('dashboard');
    } else {
        return view('welcome', [
            'count' => App\Models\Registry::count(),
        ]);
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
