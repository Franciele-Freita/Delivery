<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Livewire\Marketplace\StoreComponent;
use Illuminate\Support\Facades\Route;
Route::get('marketplace/location', 'Marketplace\MarketplaceController@location')->name('store.marketplace.location');
//Route::get('marketplace/{id}', 'Marketplace\MarketplaceController@show')->name('store.marketplace.show'); //-> rota via controller
Route::get('marketplace/{id}', StoreComponent::class)->name('store.marketplace.show');
Route::any('marketplace/search', 'Marketplace\MarketplaceController@storeSearch')->name('store.marketplace.storeSearch');
//Route::get('marketplace/search/{category}', MarketplaceComponent::class)->name('marketplace.search');



