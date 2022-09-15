<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Livewire\Marketplace\CartComponent;
use Illuminate\Support\Facades\Route;


Route::get('cart', CartComponent::class)->name('cart');
Route::get('add-cart', [App\Http\Controllers\Cart\CartController::class, 'index'])->middleware(['auth'])->name('cart.index');

Route::post('add-cart', [App\Http\Controllers\Cart\CartController::class, 'show'])->middleware(['auth'])->name('cart.show');

Route::post('cartItemAdd', [App\Http\Controllers\Cart\CartController::class, 'cartItemAdd'])->middleware(['auth'])->name('cart.cartItemAdd');
Route::post('cartItemSubtract', [App\Http\Controllers\Cart\CartController::class, 'cartItemSubtract'])->middleware(['auth'])->name('cart.cartItemSubtract');
