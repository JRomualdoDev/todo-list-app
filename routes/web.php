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


Route::get('/', Welcome::class);

Route::get('/tasks/create', App\Livewire\Tasks\Create::class);
Route::get('/tasks/show', App\Livewire\Tasks\Show::class);

Route::get('/category/create', App\Livewire\Category\Create::class);
Route::get('/category/show', App\Livewire\Category\Show::class);
