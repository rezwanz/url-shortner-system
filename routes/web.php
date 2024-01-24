<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

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
});

Route::controller(ShortLinkController::class)->group(function () {
    Route::get('generate-shorten-link', 'index')->name('generate-shorten-link');
    Route::post('generate-shorten-link', 'store')->name('generate.link');
    Route::get('{code}', 'shortenLink')->name('shorten.link');
});
