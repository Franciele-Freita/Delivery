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

Route::group(['prefix' => '/store', 'namespace' => 'Store'], function() {
    Route::middleware(['auth:partner'])->group(function () {
    });
    Route::get('/dados-loja', 'StoreController@index')->name('partner.details.index');
    Route::get('/dados-loja/{user}/{address}', 'StoreController@show')->name('partner.details.show');
    Route::post('/dados-loja', 'StoreController@store')->name('partner.details.store');
    Route::get('/Welcome', 'StoreController@welcome')->name('partner.store.Welcome');

});

