<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category', [CategoryController::class, 'index'])->name('dosen.index');

Route::post('/movie', [MovieController::class, 'store'])->name('mahasiswa.store');
Route::get('/create-movie', [MovieController::class, 'create']);

Route::post('/category', [CategoryController::class, 'store'])->name('dosen.store');
Route::get('/create-category', [CategoryController::class, 'create']);

// Route::get('/mhs', [MahasiswaController::class,'index']);
Route::resource('/movie',MovieController::class);
Route::resource('/category', CategoryController::class);
