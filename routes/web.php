<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/admin/dashboard', [AdminController::class , 'adminIndex']);



Route::get('/admin/theatre', [AdminController::class , 'theatreIndex'])->name('theatre-index');
Route::post('/admin/theatre', [AdminController::class , 'theatreAdd'])->name('theatre-add');



Route::get('/admin/movies', [AdminController::class , 'moviesIndex'])->name('movies-index');
Route::post('/admin/movies', [AdminController::class , 'movieAdd'])->name('movies-add');
