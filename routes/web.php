<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', App\Livewire\Tasks\Show::class);

Route::prefix('tasks')->group(function () {
    Route::get('/create', App\Livewire\Tasks\Create::class);
    Route::get('/show', App\Livewire\Tasks\Show::class);
});

Route::prefix('category')->group(function () {
    Route::get('/create', App\Livewire\Category\Create::class);
    Route::get('/show', App\Livewire\Category\Show::class);
});
