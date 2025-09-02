<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('auth')->group(function () {
    Route::get('/register', App\Livewire\Auth\Register::class)
        ->name('register');

    Route::get('/login', App\Livewire\Auth\Login::class)
        ->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', App\Livewire\Actions\Logout::class)
        ->name('logout');
});
