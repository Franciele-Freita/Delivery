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

Route::get('add-cart', 'Cart\CartController@index')->middleware(['auth'])->name('cart.index');

Route::post('add-cart', 'Cart\CartController@show')->middleware(['auth'])->name('cart.show');

Route::post('cartItemAdd', 'Cart\CartController@cartItemAdd')->middleware(['auth'])->name('cart.cartItemAdd');
Route::post('cartItemSubtract', 'Cart\CartController@cartItemSubtract')->middleware(['auth'])->name('cart.cartItemSubtract');
