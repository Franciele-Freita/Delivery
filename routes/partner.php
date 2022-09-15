<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Livewire\Partner\Requests\RequestComponent;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/partner', 'namespace' => 'Partner'], function() {
    Route::middleware(['auth:partner'])->group(function () {
        Route::get('/logout', [App\Http\Controllers\Partner\Auth\AuthPartnerController::class, 'destroy'])->name('partner.destroy');
    });

    Route::group(['namespace' => 'Auth'], function() {

        /* Logout */
        Route::middleware(['auth:partner'])->group(function () {
            Route::post('/logout', [App\Http\Controllers\Partner\Auth\AuthPartnerController::class, 'destroy'])->name('partner.destroy');
        });

        /* Login */
        Route::get('/login', [App\Http\Controllers\Partner\Auth\AuthPartnerController::class, 'index'])->name('partner.login.index');
        Route::post('/login', [App\Http\Controllers\Partner\Auth\AuthPartnerController::class, 'store'])->name('partner.login.store');
        /* Register */
        Route::get('/register', [App\Http\Controllers\Partner\Auth\RegisterPartnerController::class,'index'])->name('partner.register.index');
        Route::get('/register/endereco', [App\Http\Controllers\Partner\Auth\AddressPartnerController::class, 'index'])->name('partner.address.index');
        Route::get('/register/endereco/{user}', [App\Http\Controllers\Partner\Auth\AddressPartnerController::class, 'show'])->name('partner.address.show');
        Route::post('/register/endereco', [App\Http\Controllers\Partner\Auth\AddressPartnerController::class, 'store'])->name('partner.address.store');
        //Route::get('/register/dados-loja', 'StoreDetails@index')->name('partner.details.index');
        Route::post('/register', [App\Http\Controllers\Partner\Auth\RegisterPartnerController::class, 'Store'])->name('partner.register.store');


    });
});

Route::middleware(['auth:partner'])->group(function () {

Route::get('/partner/user', function(){
    return view('layouts.painel-partner');
})->name('painel');
});



Route::get('/partner/dashboard', [App\Http\Controllers\Partner\PartnerController::class, 'index'])->middleware(['auth:partner'])->name('partner.index');
Route::get('/partner/pedidos', RequestComponent::class)->name('order.index');
//Route::get('/partner/pedidos', [App\Http\Controllers\Partner\OrderPartnerController::class, 'index'])->name('order.index');
Route::get('/partner/setup', [App\Http\Controllers\Partner\Setup\StoreSetupController::class, 'index'])->name('setup.index');
Route::get('/partner/setup/Open-Close', [App\Http\Controllers\Partner\Setup\StoreSetupController::class, 'create'])->name('setup.create');
