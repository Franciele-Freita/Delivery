<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Livewire\User\Profile\AddressComponent;
use App\Http\Livewire\User\Profile\ProfileComponent;
use App\Http\Livewire\User\Profile\PurchaseDetailsComponent;
use App\Http\Livewire\User\Profile\TestetesteComponent as ProfileTestetesteComponent;
use App\Http\Livewire\User\TestetesteComponent;
use Illuminate\Support\Facades\Route;

/* Admin Auth */

Route::group(['prefix' => '/cliente', 'namespace' => 'User'], function() {
    Route::middleware(['auth:admin'])->group(function () {
        //Route::get('/{id}', 'User\UserController@show')->name('user');

    });

    //Route::get('/profile', [App\Http\Controllers\User\UserController::class, 'index'])->name('profile.index');
    Route::get('/purchase', [App\Http\Controllers\User\PurchaseController::class, 'index'])->name('purchase.index');
});

Route::get('/cliente/profile', ProfileComponent::class)->name('profile.index');
 /* end routes Admin */

