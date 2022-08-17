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


Route::group(['prefix' => '/partner', 'namespace' => 'Partner\Product', 'middleware' => 'auth:partner'], function() {
    Route::get('/product', 'ProductController@index')->name('product.index');

    Route::get('/product/register', 'ProductRegisterController@index')->name('product.register.index');
    Route::post('/product/register', 'ProductRegisterController@store')->name('product.register.store');


});

Route::group(['prefix' => '/partner', 'namespace' => 'Partner\Category', 'middleware' => 'auth:partner'], function() {
    Route::get('/category', 'CategoryController@index')->name('category.index');

    Route::get('/category/register', 'CategoryRegisterController@index')->name('category.register.index');
    Route::post('/category/register', 'CategoryRegisterController@store')->name('category.register.store');
    Route::get('/category/{name}/update', 'CategoryRegisterController@show')->name('category.update.show');
    Route::post('/category/update', 'CategoryRegisterController@update')->name('category.update');


});
