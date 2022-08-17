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

Route::group(['prefix' => '/partner', 'namespace' => 'Partner'], function() {
    Route::middleware(['auth:partner'])->group(function () {
        Route::get('/logout', 'AuthPartnerController@destroy')->name('partner.destroy');
    });

    Route::group(['namespace' => 'Auth'], function() {

        /* Logout */
        Route::middleware(['auth:partner'])->group(function () {
            Route::post('/logout', 'AuthPartnerController@destroy')->name('partner.destroy');
        });

        /* Login */
        Route::get('/login', 'AuthPartnerController@index')->name('partner.login.index');
        Route::post('/login', 'AuthPartnerController@store')->name('partner.login.store');
        /* Register */
        Route::get('/register', 'RegisterPartnerController@index')->name('partner.register.index');
        Route::get('/register/endereco', 'AddressPartnerController@index')->name('partner.address.index');
        Route::get('/register/endereco/{user}', 'AddressPartnerController@show')->name('partner.address.show');
        Route::post('/register/endereco', 'AddressPartnerController@store')->name('partner.address.store');
        //Route::get('/register/dados-loja', 'StoreDetails@index')->name('partner.details.index');
        Route::post('/register', 'RegisterPartnerController@Store')->name('partner.register.store');


    });
});

Route::middleware(['auth:partner'])->group(function () {

Route::get('/partner/user', function(){
    return view('layouts.painel-partner');
})->name('painel');
});



Route::get('/partner/dashboard', 'Partner\PartnerController@index')->middleware(['auth:partner'])->name('partner.index');
Route::get('/partner/pedidos', 'Partner\OrderPartnerController@index')->name('order.index');
Route::get('/partner/setup', 'Partner\Setup\StoreSetupController@index')->name('setup.index');
Route::get('/partner/setup/Open-Close', 'Partner\Setup\StoreSetupController@create')->name('setup.create');
