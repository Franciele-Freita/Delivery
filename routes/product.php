<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Livewire\Partner\Product\ProductComponent;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => '/partner', 'namespace' => 'Partner\Product', 'middleware' => 'auth:partner'], function() {

    Route::get('/product', [App\Http\Controllers\Partner\Product\ProductController::class, 'index'])->name('product.index');

    Route::get('/product/register', [App\Http\Controllers\Partner\Product\ProductRegisterController::class, 'index'])->name('product.register.index');
    Route::post('/product/register', [App\Http\Controllers\Partner\Product\ProductRegisterController::class, 'store'])->name('product.register.store');


});

Route::group(['prefix' => '/partner', 'namespace' => 'Partner\Category', 'middleware' => 'auth:partner'], function() {
    Route::get('/category', [App\Http\Controllers\Partner\Category\CategoryController::class, 'index'])->name('category.index');

    Route::get('/category/register', [App\Http\Controllers\Partner\Category\CategoryRegisterController::class, 'index'])->name('category.register.index');
    Route::post('/category/register', [App\Http\Controllers\Partner\Category\CategoryRegisterController::class, 'store'])->name('category.register.store');
    Route::get('/category/{name}/update', [App\Http\Controllers\Partner\Category\CategoryRegisterController::class, 'show'])->name('category.update.show');
    Route::post('/category/update', [App\Http\Controllers\Partner\Category\CategoryRegisterController::class, 'update'])->name('category.update');


});
