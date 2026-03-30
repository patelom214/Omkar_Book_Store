<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () { return view('home'); });
Route::get('/adventure', function () { return view('adventure_book'); });
Route::get('/horror', function () { return view('horror_books'); });
Route::get('/comedy', function () { return view('comedy_books'); });
Route::get('/kids', function () { return view('kids_books'); });
Route::get('/cart', function () { return view('cart'); });

// Authentication Pages
Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/registation', function () { return view('registation'); })->name('register');

// Authentication Processing 
Route::post('/register_post', [AuthController::class, 'registerUser']);
Route::post('/login_post', [AuthController::class, 'loginUser']);
Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout');

// Protected Profile Pages
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'viewProfile'])->name('profile');
    Route::post('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
});
