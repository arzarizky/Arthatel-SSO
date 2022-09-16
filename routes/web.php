<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthRadiusController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\ProfilUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::get('/', [AuthRadiusController::class, 'index'])->name('login');
Route::post('/', [AuthRadiusController::class, 'login'])->name('login.post');

// Middleware Auth
Route::middleware(['auth'])->group(function () {

    // Data User
    Route::get('/data-user', [DataUserController::class, 'index'])->name('index.data-user');
    Route::Post('/data-user{id}', [DataUserController::class, 'updateDataUser'])->name('update.data-user');

    // Verifikasi Email User
    Route::get('/email/verification', [VerifyEmailController::class, 'index'])->name('verification');
    Route::get('/email/verification-notification', [VerifyEmailController::class, 'notificationEmail'])->name('verification.notice');
    Route::post('/email/resend-verification', [VerifyEmailController::class, 'resend'])->name('verification.send');
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
});

// Middleware Auth And Verified
Route::middleware(['auth', 'verified'])->group(function () {

    // Portal
    Route::get('/portal', [PortalController::class, 'portal'])->name('portal');

    // Update Profile User
    Route::post('/update-profile{id}', [ProfilUserController::class, 'updateProfilUser'])->name('update.profile-user');
    Route::post('/update-profile/avatar{id}', [ProfilUserController::class, 'updateProfilAvatarUser'])->name('update.profile-avatar-user');

    // Logout
    Route::get('/logout', [AuthRadiusController::class, 'logout'])->name('logout');
});



