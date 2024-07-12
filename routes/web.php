<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

        Route::get('/mekaniks', [MekanikController::class, 'index'])->name('mekaniks.index');
        Route::get('/servis', [ServisController::class, 'index'])->name('servis.index');
        Route::get('/search', [SearchController::class, 'search'])->name('search');

        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register']);
        Route::get('/reset/pssword', [AuthController::class, 'reset'])->name('reset');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');

        Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('password/resett', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::get('/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
        Route::post('/reset/pssword', [AuthController::class, 'reset'])->name('reset');

        Route::middleware('auth.api')->group(function () {
            Route::post('/user', function (Request $request) {
                return $request->user();
            });
        });

        Route::middleware(['role:admin'])->group(function () {
            Route::resource('/mekaniks', MekanikController::class);
            Route::put('/mekaniks/{id_mekanik}', [MekanikController::class, 'update'])->name('mekaniks.update');
            Route::resource('/servis', ServisController::class);
        });

        Route::middleware(['role:customer'])->group(function () {
            Route::get('/customer', [AuthController::class,'index'])->name('customer.dashboard');
        });

        Route::get('/forgot-password', function () {
            return view('auth.password.email');
        })->middleware('guest')->name('password.request');

        Route::post('/forgot-password', [ForgotController::class, 'sendEmail'])->middleware('guest')->name('pw.email');
        Route::post('/reset-password', [ForgotController::class, 'resetForm'])->middleware('guest')->name('gg.email');

        Route::get('/reset-password/{token}', function (string $token) {
            return view('auth.password.reset', ['token' => $token]);
        })->middleware('guest')->name('password.reset');

