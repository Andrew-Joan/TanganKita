<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return "halo";
// });


Route::get('/contact', [ContactController::class, 'index'])->name('contact');