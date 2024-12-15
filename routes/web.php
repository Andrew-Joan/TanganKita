<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\FundDonationController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(LoginController::class)->group(function() {
    Route::middleware('guest')->group(function() {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'attemptLogin')->name('login.attempt');
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/about-us', function() {
    return view('about-us');
})->name('about-us');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::prefix('fund-donation')
    ->name('fund-donation.')
    ->controller(FundDonationController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{fundDonation}', 'show')->name('show');
        Route::post('/store', 'store')->name('store')->middleware('auth.redirect');
        Route::patch('/update{fundDonation}', 'update')->name('update')->middleware('auth.redirect');
        Route::delete('/delete/{fundDonation}', 'destroy')->name('destroy')->middleware('auth.redirect');
        Route::patch('/donate-fund', 'donateFund')->name('donate-fund')->middleware('auth.redirect');
    });


Route::prefix('volunteer')
    ->name('volunteer.')
    ->controller(VolunteerController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{volunteer}', 'show')->name('show');
        Route::get('/show/{volunteer}/list-volunteer-applicants', 'listVolunteerApplicants')->name('list-volunteer-applicants');
        Route::post('/store', 'store')->name('store')->middleware('auth.redirect');
        Route::patch('/update{volunteer}', 'update')->name('update')->middleware('auth.redirect');
        Route::delete('/destroy/{volunteer}', 'destroy')->name('destroy')->middleware('auth.redirect');
        Route::patch('/apply-volunteer', 'applyVolunteer')->name('apply-volunteer')->middleware('auth.redirect');
        Route::patch('/verify-applicant/{volunteerTransaction}', 'verifyApplicant')->name('verify-applicant')->middleware('auth.redirect');
    });

Route::prefix('profile')
    ->name('profile.')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index')->middleware('auth');
        Route::get('/list-donation-history', 'listDonationHistory')->name('listDonationHistory')->middleware('auth');
        Route::get('/list-volunteer-history', 'listVolunteerHistory')->name('listVolunteerHistory')->middleware('auth');
    });

Route::prefix('admin')
    ->name('admin.')
    ->controller(AdminController::class)
    ->middleware('auth.admin')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list-donation-verification', 'listDonationVerification')->name('listDonationVerification');
        Route::get('/list-volunteer-verification', 'listVolunteerVerification')->name('listVolunteerVerification');
        Route::patch('/verifyDonation/{fundDonation}', 'verifyDonation')->name('verifyDonation');
        Route::patch('/verifyVolunteer/{volunteer}', 'verifyVolunteer')->name('verifyVolunteer');
    });
