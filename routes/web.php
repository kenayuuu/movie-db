<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'homepage']);
Route::get('/movies/{id}/{slug}', [MovieController::class, 'detailmovie']);

Route::get('/category', [CategoryController::class, 'index'])->name('dosen.index');

Route::get('/movies', [MovieController::class, 'create'])->middleware('auth');
Route::post('/movie', [MovieController::class, 'store'])->name('mahasiswa.store')->middleware('auth');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/category', [CategoryController::class, 'store'])->name('dosen.store');
Route::get('/create-category', [CategoryController::class, 'create']);

// Route::get('/mhs', [MahasiswaController::class,'index']);
Route::resource('/movie',MovieController::class);
Route::resource('/category', CategoryController::class);
