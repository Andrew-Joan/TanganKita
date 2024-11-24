<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FundDonationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::prefix('fund-donation')
    ->name('fund-donation.')
    ->controller(FundDonationController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });