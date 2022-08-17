<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/* Admin Auth */

Route::group(['prefix' => '/cliente', 'namespace' => 'User'], function() {
    Route::middleware(['auth:admin'])->group(function () {
        //Route::get('/{id}', 'User\UserController@show')->name('user');

    });

    Route::get('/profile', 'UserController@index')->name('profile.index');
    Route::get('/purchase', 'PurchaseController@index')->name('purchase.index');
});



/* end routes Admin */

