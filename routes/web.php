<?php

use App\Http\Controllers\User\PostController;
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


// Client Routes
Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/{id}/details', [PostController::class, 'details'])->name('details');
Route::get('/{id}/category', [PostController::class, 'category'])->name('category');
// Route::get('/', [PostController::class, 'filter'])->name('filter');
Route::get('/filter', [PostController::class, 'filter'])->name('news.filter');
