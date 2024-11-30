<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FundDonationController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'attemptLogin'])->name('login.attempt');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'attemptRegister'])->name('register.attempt');

Route::get('/about-us', function() {
    return view('about-us');
})->name('about-us');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::prefix('fund-donation')
    ->name('fund-donation.')
    ->controller(FundDonationController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
