<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecommendationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'submit']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations');

Route::view('/faq', 'faq')->name('faq');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::post('/books/{book}/progress', [BookController::class, 'updateProgress'])->name('books.updateProgress');
