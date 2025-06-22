<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'submit']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/genres', [GenreController::class, 'index'])->middleware('auth');
});