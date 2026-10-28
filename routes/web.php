<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Tasks\TaskManager;
use App\Livewire\Assets\AssetManager;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/tasks', TaskManager::class)
    ->middleware(['auth'])
    ->name('tasks');

Route::get('/assets', AssetManager::class)
    ->middleware(['auth'])
    ->name('assets');

require __DIR__.'/auth.php';